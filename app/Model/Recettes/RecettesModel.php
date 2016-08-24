<?php

namespace Model\Recettes;

use Model\Traductions\TraductionsModel;


class RecettesModel extends \W\Model\Model 
{


	public function recordRecette($data) {

		$this->setTable('recettes');
		$this->setPrimaryKey('id');
		
		foreach ($data->steps as $key => $step) {
			
			$traduction = new TraductionsModel();

			$textFr = $traduction->getTrad($step->textPlain);
			$descriptionFr = $traduction->getTrad($step->description);
			$ordre = $key + 1;

			$stepfr = array(
				'idcocktail' 	=> $data->id,
				'texte'		 	=> $textFr,
				'description'	=> $descriptionFr,
				'ordre'			=> $ordre,
				'langue' 		=> 'en'
				);

			
			$this->insert($stepfr);
 			
 			$recettefr[] = $stepfr;
		}

		return $recettefr;
		
	}


	public function getRecette($idcocktail) {

		$_jsonurl 		= 'https://addb.absolutdrinks.com/drinks/' . $idcocktail . '/howtomix/?apiKey=9183cb55cbf047fb9a4dacda11077cce';
		$_json 			= file_get_contents($_jsonurl);
		$_recetteapi 	= json_decode($_json);

		$this->setTable('recettes');
		$this->setPrimaryKey('id');

		$recette = $this->search(['idcocktail' => $idcocktail]);

		if (empty($recette)) {
			$recette = $this->recordRecette($_recetteapi);
		}

		return $recette;
	}








}