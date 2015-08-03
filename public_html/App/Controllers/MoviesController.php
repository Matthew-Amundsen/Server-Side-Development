<?php

namespace App\Controllers;

use App\Models\Movie;
use App\Views\MoviesView;
use App\Views\SingleMovieView;
use App\Views\MovieFormView;
use App\Models\Comment;

class MoviesController extends Controller
{
	public function index()
	{
		$movies = Movie::all("title");

		$view = new MoviesView(compact('movies'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function show()
	{
		$movie = new Movie((int)$_GET['id']);
		$newcomment = $this->getCommentFormData();

		$comments = $movie->comments();

		$view = new SingleMovieView(compact('movie', 'comments', 'newcomment'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function create()
	{
		static::$auth->mustBeAdmin();

		$movie = $this->getMovieFormData();

		$view = new MovieFormView(compact('movie'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function store() 
	{
		static::$auth->mustBeAdmin();

		$movie = new Movie($_POST);

		if (! $movie->isValid()) {
			$_SESSION['movie.form'] = $movie;
			
			header("Location: ./?page=movie.create");
			exit();
		}

		if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
			$movie->savePoster($_FILES['poster']['tmp_name']);
		}

		$movie->save();

		header("Location: ./?page=movie&id=" . $movie->id);
	}
//----------------------------------------------------------------------------------------------------------------//
	public function edit() 
	{
		static::$auth->mustBeAdmin();

		$movie = $this->getMovieFormData($_GET['id']);

		$view = new MovieFormView(compact('movie'));
		$view->render();
	}

//----------------------------------------------------------------------------------------------------------------//
	public function update()
	{
		static::$auth->mustBeAdmin();

		$movie = new Movie($_POST['id']);
		$movie->processArray($_POST);

		if (! $movie->isValid()) {
			$_SESSION['movie.form'] = $movie;

			header("Location: ./?page=movie.edit&id=" . $_POST['id']);
			exit();
		}

		if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
			$movie->savePoster($_FILES['poster']['tmp_name']);
		} else if (isset($_POST['remove-image']) && $_POST['remove-image'] === "TRUE") {
			$movie->poster = null;
		}

		$movie->save();

		header("Location: ./?page=movie&id=" . $movie->id);

	}
//----------------------------------------------------------------------------------------------------------------//
	public function destroy()
	{
		static::$auth->mustBeAdmin();
		
		Movie::destroy($_POST['id']);

		header("Location: ./?page=movies");
	}
//----------------------------------------------------------------------------------------------------------------//
	private function getMovieFormData($id = null)
	{
		if (isset($_SESSION['movie.form'])) {
			$movie = $_SESSION['movie.form'];
			unset($_SESSION['movie.form']);
		} else {
			$movie = new Movie($id);
		}
		return $movie;
	}
//----------------------------------------------------------------------------------------------------------------//
	private function getCommentFormData($id = null)
	{
		if (isset($_SESSION['comment.form'])) {
			$comment = $_SESSION['comment.form'];
			unset($_SESSION['comment.form']);
		} else {
			$comment = new Comment($id);
		}
		return $comment;
	}
}