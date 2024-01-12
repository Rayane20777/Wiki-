<?php

class TagsOfWiki {

    private $id_tag;
    private $id_wiki;

    public function __construct()
    {
    }

	public function getTag_id(){
		return $this->id_tag;
	}

	public function setTag_id($id_tag){
		$this->id_tag = $id_tag;
	}

	public function getWiki_id(){
		return $this->id_wiki;
	}

        public function setWiki_id($id_wiki){
		$this->id_wiki = $id_wiki;
	}
}