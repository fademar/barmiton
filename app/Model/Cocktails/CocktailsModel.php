<?php

namespace Model\Cocktails;

class CocktailsModel extends \W\Model\Model 
{
	
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $_cocktailapi;
	private $_cocktaildb;

	private $_cocktailcard = array();
	private $_datafetched = array();
	private $_cocktaillist = array();

	private $_selection; 
	private $_cocktailselection = array();
	private $_arraykey = array();
	private $_listenoms = array();
	private $_cocktailnote;
	private $_bestcocktail;
	private $_compteurnote = array();


	/************************ Récupération des données selon l'url *****************************/


	public function getCocktailList($urlpart)
	{
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '/?pageSize=1500&apiKey=2c758736e5f844bdb9d39308df889c6d';

		/**************** Récupération des données ******************/
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		if (!empty($_data)) {

			/**************** Enregistrement des données dans un tableau associatif ******************/
			foreach ($_data as $_cocktail) {

				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktail->id . "png",
				);
			
				$_cocktaillist[] = $_cocktailcard;

			
			} // Fin de foreach()	
		}
		else {
			$_cocktaillist = '';
		}
				
		return $_cocktaillist;	

	}

	
	public function getcocktaildata($id)
	{
		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $id . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		$_cocktailapi = $_data[0];

		$this->setTable('cocktails');
		$_cocktaildb = $this->search(['idCocktailApi' => $id]);




		$_cocktaildata = array(
							'id'			=> $_cocktailapi->id,
							'name' 			=> $_cocktailapi->name,
							'ingredients'	=> $_cocktailapi->ingredients,
							'description'	=> $_cocktaildb[0]['description'],
							'occasions' 	=> $_cocktailapi->occasions,
							'taste' 		=> $_cocktailapi->tastes,
							'color' 		=> $_cocktailapi->color,
							'skill' 		=> $_cocktailapi->skill->name,
							'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktailapi->id . "(60).jpg",
							'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktailapi->id . ".png",

		);
	

				
		return $_cocktaildata;

	} //fin de function getcocktaillist



	/************************ Récupération d'une sélection aléatoire de cocktails *****************************/
	
	public function getRandomSelection($data, $n) {

		$_arraykey = array_rand($data, $n); // Je passe en paramètre les données Json et le nombre de cocktails à montrer
			
		foreach ($_arraykey as $datakey) {

			$_cocktail = $data[$datakey];			

			$_cocktailselection[] = $_cocktail;
						
		} // Fin de foreach ($_arraykey as $datakey)

		return $_cocktailselection;

	} // Fin de fonction




	

	

	public function getBestCocktails() {
		
		$this->setTable('bestcocktail');

		$_listebest = $this->findAll();

		foreach ($_listebest as $_bestcocktail) {
			
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/'. $_bestcocktail['idCocktailApi'] .'?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			

			/**************** Traitement des données ******************/
			foreach ($_data as $_cocktail) {


				$_cocktailcard = array(
										'id'			=> $_cocktail->id,
										'name' 			=> $_cocktail->name,
										'ingredients'	=> $_cocktail->ingredients,
										'description'	=> $_bestcocktail['description'],
										'occasions' 	=> $_cocktail->occasions,
										'taste' 		=> $_cocktail->tastes,
										'color' 		=> $_cocktail->color,
										'skill' 		=> $_cocktail->skill->name,
										'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",
										'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktail->id . ".png",
									);
				
				$_cocktaillist[] = $_cocktailcard;
				
			}
			
		}

		return $_cocktaillist;

	} //fin de function getbestcocktail




} //Fin de classe