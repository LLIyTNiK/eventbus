<?php
namespace lliytnik\eventbus;

class EventBus
{
    public $transport;
    public $event;

    public function __construct($transport=null){
        $this->transport = $transport;
    }

    public function setTransport(Transport $transport){
        $this->transport = $transport;
    }

    public function setEvent(Event $event){
        $this->event = $event;
    }

    public function send(Event $event){
        return $this->transport->send($event);
    }
}