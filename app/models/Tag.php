<?php

class Tag
{

    private $id_tag;
    private $name;

    public function __construct()
    {
    }

    public function getId_tag(){
		return $this->id_tag;
	}

	public function setId_tag($id_tag){
		$this->id_tag = $id_tag;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
}
?>