<?php
namespace lliytnik\eventbus\events;

use lliytnik\eventbus\events;

abstract class Event
{
    public $name;
    public $class;
    public $data;

    public function __construct(array $params){
        foreach ($params as $name=>$value){
            $this->$name = $value;
        }
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setClass($class){
        $this->class = $class;
    }

    public function setTransport(Transport $transport){
        $this->transport = $transport;
    }


}