<?php


namespace lliytnik\eventbus\events;


class LeadEvent extends Event
{
    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->name = 'leadEvent';
        $this->class = '\common\models\Lead';
    }



}