<?php
namespace Foxconn\Click;

use Nette\Application\UI\Control;
use Nette\Forms\Form;

class ClickComponent extends Control
{
	private $users;

	/**
	 * @persistent
	 * @var int
	 */
	public $show = 0;

	public function render()
	{
		$this->template->setFile(__DIR__ . '/default.latte');
		$this->template->users = $this->users;
		$this->template->show = $this->show;
		$this->template->render();
	}

	public function handleShow()
	{
		if ($this->show) {
			$this->show = 0;
		} else {
			$this->show = 1;
		}
		$this->redrawControl('info');
	}

	public function setUsers($string)
	{
		$this->users = $string;
	}

	public function createComponentForm()
	{
		$form = new Form();
		$form->addText('test');
		return $form;
	}
}