<?php
$b= new \lliytnik\eventbus\EventBus(new \lliytnik\eventbus\transport\FileTransport('.'));
$b->send(new \lliytnik\eventbus\events\LeadEvent(['data'=>['id'=>1,'method'=>'test']]));