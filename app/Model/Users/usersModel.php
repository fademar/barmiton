<?php
namespace Model\Users;

class UsersModel extends \W\Model\UsersModel
{
	public function insertPassword($id, $newPassword)
		{
			$this->setTable('users');

			$userdb = $this->find($id);
		}	
}