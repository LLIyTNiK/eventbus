<?php
namespace lliytnik\eventbus;

use lliytnik\eventbus\events\Event;
use lliytnik\eventbus\transports\Transport;

class EventBus
{
    /**
     * @var $transport Transport
     */
    public $transport;
    public $event;
    public $onSendFail;

    public function __construct($transport=null){
        $this->transport = $transport;
    }

    public function setTransport(Transport $transport){
        $this->transport = $transport;
    }

    public function setEvent(Event $event){
        $this->event = $event;
    }

    public function send(Event $event=null){
        $eventToSend = null;
        if($event){
            $eventToSend = $event;
        }elseif ($this->event){
            $eventToSend = $this->event;
        }else{
            throw new \Exception('Event not set');
        }
        $isSended = $this->transport->send($event);
        if(!$isSended && $this->onSendFail){
             return ($this->onSendFail)($event);
        }
        return $isSended;
    }

    public function consume(){
        $this->transport->consume();
    }
}