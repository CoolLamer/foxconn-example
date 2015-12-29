<?php
namespace Foxconn\Repository;

use Nette\Security\Passwords;

class UserRepository extends BaseRepository
{
	protected $table = 'user';

	public function createUser($username, $password)
	{
		$data = [
			'userName' => $username,
			'hash' => Passwords::hash($password)
		];
		$this->getTable()->insert($data);
	}

	/**
	 * @param $username
	 * @param $password
	 * @return false|\Nette\Database\Table\IRow
	 */
	public function checkPassword($username, $password)
	{
		$user = $this->getTable()->where([
			'userName' => $username
		])->fetch();
		if ($user) {
			if (Passwords::verify($password, $user->hash)) {
				return $user;
			}
		}
		return false;
	}

	/**
	 * @return array
	 */
	public function getUsers()
	{
		$result = [];
		foreach($this->getTable() as $user){
			$result[] = $user->toArray();
		}
		return $result;
	}
}