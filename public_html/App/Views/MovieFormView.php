<?php

namespace App\Views;

class MovieFormView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "movie.form";
		$page_title = "Add New Movie";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/movieform.inc.php";
	}
}
