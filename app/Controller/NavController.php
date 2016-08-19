<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Users\UsersModel;

class NavController extends Controller
{

	public function showNav() {

		$user = new UsersModel();
		$loggedUser = $user->getUser();


		if (!empty($loggedUser)) {
			$userlog = true;
		}
		else {
			$userlog = false;
		}



		$this->show('/nav', ['userlog' => $userlog]);

	}

}