<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ParseXMLToModel implements ParseXMLInterface
{

    private $model;
    private $fileName;
    private $local;
    private $content;
    private $fileAdapter;

    public function __construct($modelName, $fileName, $local)
    {
        $this->fileName = $fileName;
        $this->local = $local;
        $this->fileAdapter = Storage::disk($this->local);
        $this->model = resolve($modelName);
    }

    public function parseAndSave(): bool
    {
        if($this->isFileExists()){
            $this
                ->getFileContent()
                ->parseStringToObject()
                ->saveToModel();
            return true;
        }
        return false;
    }

    public function getFileContent(): ParseXMLInterface
    {
        $this->content = $this->fileAdapter->get($this->fileName);
        return $this;
    }

    public function parseStringToObject()
    {
        $ob = simplexml_load_string($this->content);
        $json = json_encode($ob);
        $this->content = json_decode($json, true)['RECORD'];
        return $this;
    }

    public function saveToModel()
    {
        collect($this->content)->each(function ($item){
            $this->model->forceCreate($item);
        });
    }

    public function isFileExists(): bool
    {
        return $this->fileAdapter->exists($this->fileName);
    }
}
