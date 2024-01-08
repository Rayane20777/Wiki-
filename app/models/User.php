<?php

class User {
	private $id_user;
	private $full_name;
	protected $username;
	protected $email;
	protected $password;
	protected $role;

	public function __construct() {

	}

	public function __set($property, $value) {
		 if (property_exists($this, $property)){
			$this->$property = $value;
		}
	}

	public function __get($property) {
		 if (property_exists($this, $property)){
			return $this->$property;
		}
	}

}

?>
