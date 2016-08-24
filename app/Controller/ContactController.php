<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends Controller
{
	public function envoieEmail()
	{

		if($_POST){

			$to      = $_POST['email'];
			$subject = 'Merci de votre message.';
			$confirm = 'Nous avons bien reçu votre message. Nous vous répondrons au plus vite.<br>L\'équipe Barmiton';
			mail($to, $subject, $confirm);

			$Nous = 'barmiton.us@gmail.com';
			$objet = $_POST['sujet'];
			$message = $_POST['message'];
			mail($Nous, $objet, $message);
		
			$this->redirectToRoute('contact_confirmEmail');
		}

		$this->show('contact/contact');
	}



	public function confirmEmail() {

		$this->show('contact/confirmcontact');

	}



}