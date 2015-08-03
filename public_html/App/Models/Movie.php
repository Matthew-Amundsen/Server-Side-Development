<?php

namespace App\Models;
use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

class Movie extends DatabaseModel
{
	protected static $columns = ['id', 'title', 'year', 'description', 'poster'];
	protected static $tableName = "movies";

	protected static $validationRules = [
		'title' => 'minlength:1',
		'year' => 'minlength:4,maxlength:4,numeric',
		'description' => 'minlength:10'
	];

	public function comments()
	{
		return Comment::allBy('movie_id', $this->id);
	}
}