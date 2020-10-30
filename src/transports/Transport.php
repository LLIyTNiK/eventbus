<?php
namespace lliytnik\eventbus\transports;
use lliytnik\eventbus\events\Event;

abstract class Transport
{
    abstract function send(Event $event);
    abstract function consume();

    abstract function encodeEvent(Event $event);
    abstract function decodeEvent(Event $event);
}