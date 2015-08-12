<?php

namespace App\Views;

class ThreadFormView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "thread.form";
		$page_title = "Add New Thread";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/threadform.inc.php";
	}
}
