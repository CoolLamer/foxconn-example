<?php
namespace Foxconn\Services;

use Foxconn\Repository\UserRepository;
use Nette\Object;

class UserService extends Object
{
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * UserService constructor.
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function listUsers(){
		$users = $this->userRepository->getUsers();
		foreach($users as $key => $user){
			$users[$key] = $user + ['role' => 'admin'];
		}
		return $users;
	}
}