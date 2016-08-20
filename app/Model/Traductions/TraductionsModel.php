<?php 

namespace Model\Traductions;


class TraductionsModel extends \W\Model\Model 
{


	public function getTrad($text) {


		$textPlain = rawurlencode(htmlentities($text, ENT_QUOTES));

		$urlgoogle 		= 'https://www.googleapis.com/language/translate/v2?key=AIzaSyBmL7IRhjcpPBeqg3h2SYWZywj02qr3X94&q='. $textPlain . '&source=en&target=fr';

		$jsontranslate 	= file_get_contents($urlgoogle);
		$datagoogle 	= json_decode($jsontranslate);

		$textTraduit = $datagoogle->data->translations[0]->translatedText;


		return $textTraduit;

	}







}