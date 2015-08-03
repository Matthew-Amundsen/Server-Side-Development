<?php

namespace App\Views;

class CommentFormView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "comment.form";
		$page_title = "Edit Comment";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/commentform.inc.php";
	}
}
