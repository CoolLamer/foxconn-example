<?php
namespace App\Presenters;

use Foxconn\Click\IClickComponent;

class ComponentPresenter extends BasePresenter
{
	/**
	 * @inject
	 * @var IClickComponent
	 */
	public $clickFactory;

	public function createComponentAdministrators(){
		$component =  $this->clickFactory->create();
		$component->setUsers('admin');
		return $component;
	}

	public function createComponentUsers(){
		$component =  $this->clickFactory->create();
		$component->setUsers('users');
		return $component;
	}
}