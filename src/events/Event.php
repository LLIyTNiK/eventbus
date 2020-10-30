<?php
namespace lliytnik\eventbus\events;

abstract class Event
{
    public $name;
    public $class;
    public $data;

    public function __construct(Array $params){
        foreach ($params as $name=>$value){
            $this->$name = $value;
        }
    }

    public function setData($data){
        $this->data = $data;
    }
}