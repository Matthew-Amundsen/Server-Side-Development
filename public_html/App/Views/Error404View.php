<?php

namespace App\Views;

class Error404View extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "error404";
		$page_title = "Error 404 Page Not Found";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		include "templates/error404.inc.php";
	}
}
