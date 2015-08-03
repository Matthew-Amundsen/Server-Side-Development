<?php

namespace App\Controllers;

use App\Models\Item;
use App\Views\MerchandiseView;
use App\Views\SingleItemView;
use App\Views\ItemFormView;

class MerchandiseController extends Controller
{
	public function index()
	{
		$merchandise = Item::all("name");

		$view = new MerchandiseView(compact('merchandise'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function show()
	{
		$item = new Item((int)$_GET['id']);

		$view = new SingleItemView(compact('item'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function create()
	{
		$item = $this->getItemFormData();

		$view = new ItemFormView(compact('item'));
		$view->render();
	}
//----------------------------------------------------------------------------------------------------------------//
	public function store() 
	{
		$item = new Item($_POST);

		if (! $item->isValid()) {
			$_SESSION['item.form'] = $item;
			
			header("Location: ./?page=item.create");
			exit();
		}

		$item->save();

		header("Location: ./?page=item&id=" . $item->id);
	}
//----------------------------------------------------------------------------------------------------------------//
	public function edit() 
	{
		$item = $this->getItemFormData($_GET['id']);

		$view = new ItemFormView(compact('item'));
		$view->render();
	}

//----------------------------------------------------------------------------------------------------------------//
	public function update()
	{
		$item = new Item($_POST['id']);
		$item->processArray($_POST);

		if (! $item->isValid()) {
			$_SESSION['item.form'] = $item;

			header("Location: ./?page=item.edit&id=" . $_POST['id']);
			exit();
		}

		$item->save();

		header("Location: ./?page=item&id=" . $item->id);
	}
//----------------------------------------------------------------------------------------------------------------//
	public function destroy()
	{
		Item::destroy($_POST['id']);

		header("Location: ./?page=merchandise");
	}
//----------------------------------------------------------------------------------------------------------------//
		private function getItemFormData($id = null)
	{
		if (isset($_SESSION['item.form'])) {
			$item = $_SESSION['item.form'];
			unset($_SESSION['item.form']);
		} else {
			$item = new Item($id);
		}
		return $item;
	}
}