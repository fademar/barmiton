<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Admin\AdminModel;
use Model\Cocktails\CocktailsModel;

class AdminController extends Controller
{

	private $_admin;
	private $_cocktaildata;


	public function admin()
	{
		
		$this->show('admin/admin'); 
	}


	public function admincocktails()
	{
		$_admin = new AdminModel();
		$_updates = $_admin->getLastUpdates();
		$_cocktaildata = array();

		if (isset($_POST)) {
			var_dump($_POST);
			if (isset($_POST['searchdb'])) {

				$_cocktaildb = new CocktailsModel();
				$_cocktaildb->setTable('cocktails');
				$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $_POST['idcocktail']]);

				$this->show('admin/modifcocktail', [
												'cocktaildata' => $_cocktaildata,
											]);


			}


		}


		$this->show('admin/admincocktails', [
												'updates' => $_updates,
											]);


	}




}