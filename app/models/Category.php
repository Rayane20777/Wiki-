<?php

class Category
{

    private $id_category;
    private $name;

    public function __construct()
    {
    }

    public function getId_category(){
		return $this->id_category;
	}

	public function setId_category($id_category){
		$this->id_category = $id_category;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
}
?>