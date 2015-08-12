<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Views\ThreadsView;
use App\Views\SingleThreadView;
use App\Views\ThreadFormView;
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