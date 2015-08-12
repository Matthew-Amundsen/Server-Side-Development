<?php

namespace App\Models;
use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

class Thread extends DatabaseModel
{
	protected static $columns = ['id', 'user_id', 'title', 'description', 'created'];
	protected static $tableName = "threads";

	protected static $validationRules = [
		'title' => 'minlength:1',
		'description' => 'minlength:10',
		'user_id'     => 'numeric,exists:\App\Models\User',
	];

	public function comments()
	{
		return Comment::allBy('thread_id', $this->id);
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

		$query = "SELECT
				threads.id, title, description,
				MATCH(title) AGAINST(@searchterm) * 2 AS score_title,
				MATCH(description) AGAINST(@searchterm) AS score_description,
				MATCH(commentblob) AGAINST(@searchterm IN BOOLEAN MODE) * 1.5 AS score_comment
			FROM threads
			LEFT JOIN (
				SELECT thread_id, GROUP_CONCAT(comment SEPARATOR ' ') AS commentblob FROM comments
				GROUP BY thread_id
			) AS comments ON threads.id = comments.thread_id
			WHERE
				MATCH(title) AGAINST(@searchterm) OR
				MATCH(description) AGAINST(@searchterm) OR
				MATCH(commentblob) AGAINST(@searchterm IN BOOLEAN MODE)
			ORDER BY (score_title + score_description + score_comment) DESC";

		$statement = $db->prepare($query);
		$statement->execute();
		while ($record = $statement->fetch(PDO::FETCH_ASSOC)) {
			$model = new Thread();
			$model->data = $record;
			array_push($models, $model);
		}

		return $models;
	}
}