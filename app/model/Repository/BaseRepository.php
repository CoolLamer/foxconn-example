<?php
namespace Foxconn\Repository;

use Nette\Database\Context;
use Nette\Object;

abstract class BaseRepository extends Object
{

	/** @var  Context */
	protected $database;


	protected $table;


	public function __construct(Context $context)
	{
		$this->database = $context;
	}


	/**
	 * Vrati tabulku pro kazde Repository
	 * @return \Nette\Database\Table\Selection
	 */
	protected function getTable()
	{
		if (isset($this->table)) {
			return $this->database->table($this->table);
		}

		preg_match('#(\w+)Repository$#', get_class($this), $arr);

		return $this->database->table(lcfirst($arr[1]));
	}


	public function getTableName()
	{
		if (isset($this->table)) {
			return $this->table;
		}

		preg_match('#(\w+)Repository$#', get_class($this), $arr);

		return lcfirst($arr[1]);
	}


	/**
	 * @return \Nette\Database\Table\Selection
	 */
	public function findAll()
	{
		return $this->getTable();
	}


	/**
	 * @param $id
	 * @return \Nette\Database\Table\IRow
	 */
	public function get($id)
	{
		return $this->getTable()->get($id);
	}


	/**
	 * @param $data
	 * @return bool|int|\Nette\Database\Table\IRow
	 */
	public function create($data)
	{
		return $this->getTable()->insert($data);
	}


	/**
	 * Parametrizovany selection
	 *
	 * @param array $arr
	 * @return \Nette\Database\Table\Selection
	 */
	public function findBy(array $arr)
	{
		return $this->getTable()->where($arr);
	}

}