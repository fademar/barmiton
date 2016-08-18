<?php
namespace Model\Users;

class UsersModel extends \W\Model\UsersModel
{
	public function getUserName($id)
	{
		$this->setTable('users');
		$dataUser = $this->find($id);

		return $dataUser['username'];
	}
}