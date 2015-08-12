<?php

namespace App\Views;

class SingleThreadView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "thread";
		$page_title = $thread->title;
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/thread.inc.php";
	}
}
