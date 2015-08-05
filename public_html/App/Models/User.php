<?php

namespace App\Models;

class User extends DatabaseModel
{
	protected static $columns = ['id', 'username', 'email', 'password', 'role'];
	protected static $fakeColumns = ['password2'];
	protected static $tableName = "users";

	protected static $validationRules = [
		'username' => 'minlength:1',
        'email' => 'email,unique:App\Models\User',
        'password' => 'minlength:6',
        'password2' => 'match:password',
	];

	function __construct($input = null)
	{
		parent::__construct($input);

		if($this->role === null) {
			$this->role = 'user';
		}
	}
}