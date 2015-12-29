<?php

namespace App\Presenters;

use Nette;
use App\Model;


class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
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
