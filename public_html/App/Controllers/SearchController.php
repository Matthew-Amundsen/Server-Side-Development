<?php

namespace App\Controllers;

use App\Views\SearchResultsView;
use App\Models\Movie;

class SearchController extends Controller
{
	function search()
	{
		if (! isset($_GET['q'])) {
			$q = "";
		} else {
			$q = $_GET['q'];
		}

		$movies = Movie::search($q);

		$view = new SearchResultsView(compact('movies'));
		$view->render();
	}
}