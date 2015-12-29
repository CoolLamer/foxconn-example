<?php
namespace Foxconn\Click;

interface IClickComponent
{
	/**
	 * @return ClickComponent
	 */
	public function create();
}