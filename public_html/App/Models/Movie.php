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

	public static function search($searchquery)
	{
		$models = [];
		$db = static::getDatabaseConnection();

		$query = "SET @searchterm = :searchquery ;";
		$statement = $db->prepare($query);
		$statement->bindValue(':searchquery', $searchquery);
		$statement->execute();

		$query = "SELECT title, description FROM movies WHERE MATCH(title) AGAINST (@searchterm) OR MATCH(description) AGAINST (@searchterm)";

		$statement = $db->prepare($query);
		$statement->execute();
		while ($record = $statement->fetch(PDO::FETCH_ASSOC)) {
			$model = new Movie();
			$model->data = $record;
			array_push($models, $model);
		}

		return $models;
	}
}