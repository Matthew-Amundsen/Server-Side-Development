<?php

namespace App\Views;

class ItemFormView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "item.form";
		$page_title = "Add New Item";
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/itemform.inc.php";
	}
}
