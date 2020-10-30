<?php
namespace lliytnik\eventbus\transports;

use lliytnik\eventbus\events\Event;

class FileTransport extends Transport {
    private $filePath;

    public function __construct(string $filepath)
    {
        $this->setFilePath($filepath);
    }

    public function setFilePath(string $filepath){
        if(is_dir($filepath) && is_writable($filepath)){
            $this->filePath = $filepath;
        }else{
            throw new \Exception('$filepath is not a directory or not eritable');
        }
    }

    public function send(Event $event)
    {

        $fileName = $this->filePath.DIRECTORY_SEPARATOR.time().'_'.$event->name.'_'.rand(0,10000).'.csv';
        if(!is_writable($fileName)){
            return false;
        }
        while(!$fHandle = fopen($fileName,'x')){
            $fileName = $this->filePath.DIRECTORY_SEPARATOR.time().'_'.$event->name.'_'.rand(0,10000).'.csv';
        }
        fputcsv($fHandle,$this->encodeEvent($event));
        fclose($fHandle);
    }

    public function consume()
    {

    }

    function encodeEvent(Event $event)
    {
        return json_encode($event);
    }

    function decodeEvent(Event $event)
    {
        return json_decode($event);
    }
}