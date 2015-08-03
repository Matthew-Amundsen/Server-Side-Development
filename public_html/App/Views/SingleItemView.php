<?php

namespace App\Views;

class SingleItemView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "item";
		$page_title = $item->name;
		include "templates/master.inc.php";
	}

	protected function content()
	{
		extract($this->data);
		include "templates/item.inc.php";
	}
}
