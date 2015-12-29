<?php

namespace App\Presenters;

use Foxconn\Repository\UserRepository;
use Foxconn\Services\UserService;
use Nette;
use App\Model;
use Tracy\Debugger;


class HomepagePresenter extends BasePresenter
{
	/**
	 * @inject
	 * @var UserService
	 */
	public $userService;

	public function renderDefault()
	{
		$this->template->users = $this->userService->listUsers();
		if($this->isAjax()){
			$this->payload->pozdrav = 'Nazdar';
			$this->sendPayload();
		}
	}

	public function handleSoubor(){
		$response = new Nette\Application\Responses\FileResponse(__DIR__ . '/HomepagePresenter.php', 'zdrojak.php');
		$this->sendResponse($response);
	}

	public function handlePozdrav(){
		$this->payload->pozdrav = 'Nazdar';
		$this->sendPayload();
	}

	public function handleLouceni()
	{
		$data = [
			'zprava' => 'Tak cau'
		];
		$this->sendJson($data);
	}
}
