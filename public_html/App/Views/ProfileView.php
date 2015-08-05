<?php

namespace App\Views;

class ProfileView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "profile";
		$page_title = "User Name";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/profile.inc.php";
	}
}
