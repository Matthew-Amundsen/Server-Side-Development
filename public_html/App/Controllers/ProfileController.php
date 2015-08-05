<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use App\Views\MoviesView;
use App\Views\SingleMovieView;
use App\Views\MovieFormView;
use App\Views\ProfileView;

class ProfileController extends Controller
{
	public function show()
	{
		$comments = Comment::allBy("user_id", $_GET['id']);

		$view = new ProfileView(compact("comments"));
		$view->render();

		header("Location: ./?page=profile&id=" . static::$auth->user()->id);
	}
}