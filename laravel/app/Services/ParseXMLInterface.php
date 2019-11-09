<?php

namespace App\Services;

interface ParseXMLInterface{
    public function parseAndSave(): bool;
    public function getFileContent(): ParseXMLInterface;
    public function saveToModel();
    public function isFileExists(): bool ;
}
