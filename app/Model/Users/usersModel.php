<?php
namespace Model\Users;

class UsersModel extends \W\Model\UsersModel
{
<<<<<<< HEAD
	
=======
	public function getUserName($id)
	{
		$this->setTable('users');
		$dataUser = $this->find($id);

		return $dataUser['username'];
	}
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
}