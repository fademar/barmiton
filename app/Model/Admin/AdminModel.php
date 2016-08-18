<?php

namespace Model\Admin;

class AdminModel extends \W\Model\Model 
{


	private $_jsonurl;
	private $_json;	
	private $_updatelist;
	private $_updates;


	public function getLastUpdates() {

		$_jsonurl		= "https://addb.absolutdrinks.com/updates/324500/?apiKey=2c758736e5f844bdb9d39308df889c6d";
		$_json 			= file_get_contents($_jsonurl);
		$_updatelist	= json_decode($_json);


		foreach ($_updatelist as $key => $value) {
			
			if ($value->languageBranch === 'en') {

				$_updates[] = $value;

			}


		}

		return $_updates;

	}

















// "updateId":1,
// "timeStamp":"2014-02-05T09:39:31.8033565Z",
// "resource":"/Ingredients/tea-hot/",
// "objectType":"Ingredients",
// "objectId":"tea-hot",
// "typeOfChange":"Update",
// "languageBranch":"en"
// },
















}