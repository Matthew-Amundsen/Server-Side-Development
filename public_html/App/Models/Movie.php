<?php

namespace App\Models;
use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

class Movie extends DatabaseModel
{
	protected static $columns = ['id', 'user_id', 'title', 'description', 'created'];
	protected static $tableName = "movies";

	protected static $validationRules = [
		'title' => 'minlength:1',
		'description' => 'minlength:10',
		'user_id'     => 'numeric,exists:\App\Models\User',
	];

	public function comments()
	{
		return Comment::allBy('movie_id', $this->id);
	}

	public function user()
	{
		return new User($this->user_id);
	}
}