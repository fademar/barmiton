<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Outils\OutilsModel;

class OutilsController extends Controller
{
	

	public function showOutils() {

		$outilsdb = new OutilsModel();
		$outils = $outilsdb->getOutils();


		$this->show('outils/outils', ['outils' => $outils]);
		
	}
















}