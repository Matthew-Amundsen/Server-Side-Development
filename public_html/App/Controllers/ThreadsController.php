<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Views\ThreadsView;
use App\Views\SingleThreadView;
use App\Views\ThreadFormView;

class ThreadsController extends Controller
{
	public function index()
	{
		$threads = Thread::all("title");

		$view = new ThreadsView(compact('threads'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function show()
	{
		$thread = new Thread((int)$_GET['id']);
		$newcomment = $this->getCommentFormData();

		$comments = $thread->comments();

		$view = new SingleThreadView(compact('thread', 'comments', 'newcomment'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function create()
	{

		$thread = $this->getThreadFormData();

		$view = new ThreadFormView(compact('thread'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function store() 
	{

		$input = $_POST;
		$input['user_id'] =	static::$auth->user()->id;

		$thread = new Thread($input);

		if (! $thread->isValid()) {
			$_SESSION['thread.form'] = $thread;
			
			header("Location: ./?page=thread.create");
			exit();
		}

		$thread->save();

		header("Location: ./?page=thread&id=" . $thread->id);
	}
//----------------------------------------------------------------------------------------------------------------//
	public function edit() 
	{
		static::$auth->mustBeAdmin();

		$thread = $this->getThreadFormData($_GET['id']);

		$view = new ThreadFormView(compact('thread'));
		$view->render();
	}

//----------------------------------------------------------------------------------------------------------------//
	public function update()
	{
		static::$auth->mustBeAdmin();

		$thread = new Thread($_POST['id']);
		$thread->processArray($_POST);

		if (! $thread->isValid()) {
			$_SESSION['thread.form'] = $thread;

			header("Location: ./?page=thread.edit&id=" . $_POST['id']);
			exit();
		}

		if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
			$thread->savePoster($_FILES['poster']['tmp_name']);
		} else if (isset($_POST['remove-image']) && $_POST['remove-image'] === "TRUE") {
			$thread->poster = null;
		}

		$thread->save();

		header("Location: ./?page=thread&id=" . $thread->id);

	}
//----------------------------------------------------------------------------------------------------------------//
	public function destroy()
	{
		static::$auth->mustBeAdmin();
		
		Thread::destroy($_POST['id']);

		header("Location: ./?page=threads");
	}
//----------------------------------------------------------------------------------------------------------------//
	private function getThreadFormData($id = null)
	{
		if (isset($_SESSION['thread.form'])) {
			$thread = $_SESSION['thread.form'];
			unset($_SESSION['thread.form']);
		} else {
			$thread = new Thread($id);
		}
		return $thread;
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