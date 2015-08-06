<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use App\Views\MoviesView;
use App\Views\SingleMovieView;
use App\Views\MovieFormView;
use App\Views\ProfileView;

use App\Models\User;

class ProfileController extends Controller
{
	public function show()
	{
		$comments = Comment::allBy("user_id", $_GET['id']);
		$user = new User($_GET['id']);


		$view = new ProfileView(compact("comments", "user"));
		$view->render();
	}
}