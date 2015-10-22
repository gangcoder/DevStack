<?php

/**
* RecursiveFile
*/
class RecursiveFileFilterIterator extends FilterIterator
{
    protected $ext = ['jpg', 'gif'];

    function __construct($path)
    {
        parent::__construct(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path)));
    }

    public function accept()
    {
        $item = $this->getInnerIterator();
        if ($item->isFile() && in_array(pathinfo($time->getFilename()), PATHINFO_EXTENSION), $this->ext) {
            return ture;
        }
    }
}

