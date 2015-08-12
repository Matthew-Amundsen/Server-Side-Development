<?php

namespace App\Views;

class ThreadsView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "threads";
		$page_title = "Thread";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/threads.inc.php";
	}
}
