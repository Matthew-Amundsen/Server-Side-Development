<?php

namespace App\Views;

class Error401View extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "error401";
		$page_title = "Error 401 Unauthorized User";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		include "templates/error401.inc.php";
	}
}
