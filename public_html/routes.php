<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\MoviesController;
use App\Controllers\MerchandiseController;
use App\Controllers\MovieSuggestController;
use App\Controllers\ErrorController;
use App\Controllers\AuthenticationController;
use App\Controllers\CommentsController;
use App\Controllers\ProfileController;
use App\Controllers\SearchController;
use App\Services\Exceptions\InsufficientPrivilegesException;

use \App\Models\Exceptions\ModelNotFoundException;

$page = isset($_GET['page']) ? $_GET['page'] : 'movies';

try {

	switch ($page) {
		case "home":
			
			$controller = new HomeController();
			$controller->show();

			break;

		case "profile":
			
			$controller = new ProfileController();
			$controller->show();

			break;

		case "search";

			$controller = new SearchController();
			$controller->search();

			break;
////////////////////////////////////////////////////////////////////////
		case "login":

			$controller = new AuthenticationController();
			$controller->login();

			break;

		case "auth.attempt":

			$controller = new AuthenticationController();
			$controller->attempt();

			break;

		case "register":

			$controller = new AuthenticationController();
			$controller->register();

			break;

		case "auth.store":

			$controller = new AuthenticationController();
			$controller->store();

			break;

		case "logout":

			$controller = new AuthenticationController();
			$controller->logout();

			break;
////////////////////////////////////////////////////////////////////////			
		case "about":

			$controller = new AboutController();
			$controller->show();

			break;

		case "movie":

			$controller = new MoviesController();
			$controller->show();

			break;	

		case "movies":

			$controller = new MoviesController();
			$controller->index();

			break;
////////////////////////////////////////////////////////////////////////	
		case "movie.create":

			$controller = new MoviesController();
			$controller->create();

			break;

		case "movie.store":

			$controller = new MoviesController();
			$controller->store();

			break;

		case "movie.edit":

			$controller = new MoviesController();
			$controller->edit();

			break;

		case "movie.update":

			$controller = new MoviesController();
			$controller->update();

			break;

		case "movie.destroy":

			$controller = new MoviesController();
			$controller->destroy();

			break;
////////////////////////////////////////////////////////////////////////
		case "comment.create":

			$controller = new CommentsController();
			$controller->create();

			break;

		case "comment.store":

			$controller = new CommentsController();
			$controller->store();

			break;

		case "comment.edit":

			$controller = new CommentsController();
			$controller->edit();

			break;

		case "comment.update":

			$controller = new CommentsController();
			$controller->update();

			break;

		case "comment.destroy":

			$controller = new CommentsController();
			$controller->destroy();

			break;
////////////////////////////////////////////////////////////////////////
		case "moviesuggest":

			$controller = new MovieSuggestController();
			$controller->show();

			break;

		default:
			throw new ModelNotFoundException();

			break;
	}
} catch (ModelNotFoundException $e) {
	$controller = new ErrorController();
	$controller->error404();

} catch (InsufficientPrivilegesException $e) {
	$controller = new ErrorController();
	$controller->error401();

} catch (Exception $e) {
	$controller = new ErrorController();
	$controller->error500($e);
}
