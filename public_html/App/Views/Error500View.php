<?php

namespace App\Views;

class Error500View extends TemplateView
{
	public function render()
	{
		$page = "error500";
		$page_title = "Error 500 Internal Server Error";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/error500.inc.php";
	}
}
