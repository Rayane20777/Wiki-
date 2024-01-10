<?php

class User
{
	private $id_user;
	private $full_name;
	protected $username;
	protected $email;
	protected $password;
	protected $role;

	public function __construct()
	{

	}

	public function getId_user()
	{
		return $this->id_user;
	}

	public function setId_user($id_user)
	{
		$this->id_user = $id_user;
	}
	public function getFull_name()
	{
		return $this->full_name;
	}
	public function setFull_name($full_name)
	{
		$this->full_name = $full_name;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getRole()
	{
		return $this->role;
	}
	public function setRole($role)
	{
		$this->role = $role;
	}
}

?>