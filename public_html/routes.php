<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ThreadsController;
use App\Controllers\MerchandiseController;
use App\Controllers\ThreadSuggestController;
use App\Controllers\ErrorController;
use App\Controllers\AuthenticationController;
use App\Controllers\CommentsController;
use App\Controllers\ProfileController;
use App\Controllers\SearchController;
use App\Services\Exceptions\InsufficientPrivilegesException;

use \App\Models\Exceptions\ModelNotFoundException;

$page = isset($_GET['page']) ? $_GET['page'] : 'threads';

try {

	switch ($page) {

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
		case "thread":

			$controller = new ThreadsController();
			$controller->show();

			break;	

		case "threads":

			$controller = new ThreadsController();
			$controller->index();

			break;
////////////////////////////////////////////////////////////////////////	
		case "thread.create":

			$controller = new ThreadsController();
			$controller->create();

			break;

		case "thread.store":

			$controller = new ThreadsController();
			$controller->store();

			break;

		case "thread.edit":

			$controller = new ThreadsController();
			$controller->edit();

			break;

		case "thread.update":

			$controller = new ThreadsController();
			$controller->update();

			break;

		case "thread.destroy":

			$controller = new ThreadsController();
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
