<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Favoris\FavorisModel;
use Model\Users\UsersModel;

class FavorisController extends Controller
{


	public function showFavoris() {

		$loggedUser = $this->getUser();

		$favorisdb = new FavorisModel();
		$favorisdb->setTable('favoris');

		$favorisuser = $favorisdb->search(['idMembres' => ])

		$this->show('Favoris_showFavoris');
	}






}

