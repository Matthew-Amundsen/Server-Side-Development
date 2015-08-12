<?php

namespace App\Controllers;

use App\Views\SearchResultsView;
use App\Models\Thread;

class SearchController extends Controller
{
	function search()
	{
		if (! isset($_GET['q'])) {
			$q = "";
		} else {
			$q = $_GET['q'];
		}

		$threads = Thread::search($q);

		$view = new SearchResultsView(compact('threads'));
		$view->render();
	}
}