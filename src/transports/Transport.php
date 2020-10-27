<?php
namespace lliytnik\eventbus\transport;

abstract class Transport
{
    abstract function send(Event $event);
    abstract function consume();

    abstract function encodeEvent(Event $event);
    abstract function decodeEvent(Event $event);
}