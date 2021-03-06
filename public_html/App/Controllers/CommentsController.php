<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Views\CommentFormView;

class CommentsController extends Controller
{
	public function create()
	{
		$input = $_POST;
		$input['user_id'] = static::$auth->user()->id;

		$newcomment = new Comment($input);

		if (! $newcomment->isValid()) {
			$_SESSION['comment.form'] = $newcomment;
			header("Location: ./?page=thread&id=" . $newcomment->thread_id);
			exit();
		}

		if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
			$newcomment->savePoster($_FILES['poster']['tmp_name']);
		}

		$newcomment->save();
		header("Location: ./?page=thread&id=" . $newcomment->thread_id . "#comment-" . $newcomment->id);
	}
//----------------------------------------------------------------------------------------------------------------//

	public function edit() 
	{
		static::$auth->mustBeAdmin();

		$comment = $this->getCommentFormData($_GET['id']);

		$view = new CommentFormView(compact('comment'));
		$view->render();
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
//----------------------------------------------------------------------------------------------------------------//
	public function update()
	{
		static::$auth->mustBeAdmin();

		$comment = new Comment($_POST['id']);
		$comment->processArray($_POST);

		if (! $comment->isValid()) {
			$_SESSION['comment.form'] = $comment;

			header("Location: ./?page=comment.edit&id=" . $_POST['id']);
			exit();
		}

		if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
			$comment->savePoster($_FILES['poster']['tmp_name']);
		} else if (isset($_POST['remove-image']) && $_POST['remove-image'] === "TRUE") {
			$comment->poster = null;
		}

		$comment->save();

		header("Location: ./?page=thread&id=" . $comment->thread_id);

	}
//----------------------------------------------------------------------------------------------------------------//
}