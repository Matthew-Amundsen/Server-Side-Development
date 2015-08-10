<?php

namespace App\Models;

use finfo;
use Intervention\Image\ImageManagerStatic as Image;

class Comment extends DatabaseModel
{

	protected static $columns = ['id', 'user_id', 'movie_id', 'created', 'comment', 'poster'];

	protected static $tableName = "comments";

	protected static $validationRules = [
		'movie_id'    => 'numeric,exists:\App\Models\Movie',
		'user_id'     => 'numeric,exists:\App\Models\User',
		'comment'     => 'minlength:10,maxlength:16000',
	];

	public function user()
	{
		return new User($this->user_id);
	}

	public function movie()
	{
		return new Movie($this->movie_id);
	}

	public function savePoster($filename)
	{
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mime = $finfo->file($filename);

		$extensions = [
			'image/jpg'  => '.jpg',
			'image/jpeg' => '.jpg',
			'image/png'  => '.png',
			'image/gif'  => '.gif'
		];

		$extension = '.jpg';
		if (! isset($extensions[$mime])) {
			$extension = $extensions[$mime];
		}

		$newFilename = uniqid() . $extension;

		$folder = "./images/posters/originals"; // no trailing slash

		if (! is_dir($folder)) {
			mkdir($folder, 0777, true);
		}

		$destination = $folder . "/" . $newFilename;

		move_uploaded_file($filename, $destination);

		$this->poster = $newFilename;

		//240x300 80x100
		if (! is_dir("./images/posters/300h")) {
			mkdir("./images/posters/300h", 0777, true);
		}
		$img = Image::make($destination);
		$img->fit(240, 300);
		$img->save("./images/posters/300h/" . $newFilename);

		if (! is_dir("./images/posters/100h")) {
			mkdir("./images/posters/100h", 0777, true);
		}
		$img = Image::make($destination);
		$img->fit(80, 100);
		$img->save("./images/posters/100h/" . $newFilename);
	}
}