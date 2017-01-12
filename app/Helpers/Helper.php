<?php
namespace App\Helpers;

class Helper{

	public $file;

	public function __construct($file){
		$this->file = $file;
	}


	public function dataDir()
    {
        return storage_path("app");
    }

    public function filePath()
    {
        return $this->dataDir()."/".$this->file;
    }
}