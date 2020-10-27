<?php
namespace lliytnik\eventbus\transports;

use lliytnik\eventbus\events\Event;

class FileTransport {
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
        $fileName = $this->filePath.DIRECTORY_SEPARATOR.time().'_'.$event->name.'_'.$this->stream_id.'_'.$this->webmaster_id.'_'.rand(0,10000).'.csv';
        if(!is_writable($fileName)){
            return false;
        }
        while(!$fHandle = fopen($fileName,'x')){
            $fileName = $this->filePath.DIRECTORY_SEPARATOR.time().'_'.$this->offer_id.'_'.$this->stream_id.'_'.$this->webmaster_id.'_'.rand(0,10000).'.csv';
        }
        fputcsv($fHandle,$event->data);
        fclose($fHandle);
    }

    public function consume()
    {

    }
}