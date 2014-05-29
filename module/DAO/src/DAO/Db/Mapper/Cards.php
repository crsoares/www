<?php

namespace DAO\Db\Mapper;

use Zend\Db\Sql\Where;
use DAO\Db\DTO\Cards as CardsDto;
use DAO\Db\Mapper\MapperInterface;

class Cards extends MapperAbstract implements MapperInterface
{
	public function delete($id)
	{
		$sql = $this->getSqlObject();

		$where = new Where();

		$where->equalTo('id', $id);

		try{
			$statement = $sql->prepareStatementForSqlObject(
				$sql->delete()->where($where)
			);

			$result = $statement->execute();

			return $result->getAffectedRows() > 0;
		}catch(\Exception $e){
			return false;
		}
	}

	public function getAll()
	{
		$sql = $this->getSqlObject();

		$statement = $sql->prepareStatementForSqlObject(
			$sql->select()
		);

		$records = $statement->execute();

		$retval = array();

		foreach($records as $row) {
			$retval[] = new CardsDto(
				$row['type'],
				$row['value'],
				$row['color'],
				$row['id']
			);
		}

		return $retval;
	}

	public function insert($data)
	{
		if(!$data instanceOf DAO\Db\DTO\Cards) {
			throw new \Exception(
				'Os dados precisam ser do tipo DAO\Db\DTO\Cards'
			);
		}

		$sql = $this->getSqlObject();

		try{
			$statement = $sql->prepareStatementForSqlObject(
				$sql->insert()
					->values(array(
						'color' => $data->getColor(),
						'type' => $data->getType(),
						'value' => $data->getValue()
					))
			);

			$result = $statement->execute();

			return $result->getGeneratedValue();
		}catch(\Exception $e)
		{
			return false;
		}
	}

	public function load($id)
	{
		$sql = $this->getSqlObject();

		$where = new Where();
		$where->equalTo('id', $id);

		try{
			$statement = $sql->prepareStatementForSqlObject(
				$sql->select()->where($where)
			);

			$record = $statement->execute()->current();

			return new CardsDto(
				$record['type'],
				$record['value'],
				$record['color'],
				$record['id']
			);
		}catch(\Exception $e) {
			return false;
		}
	}

	public function update($data)
	{
		if(get_class($data) !== 'DAO\Db\DTO\Cards') {
			throw new \Exception("Os dados precisam ser do tipo DAO\Db\DTO\Cards");
		}

		if($data->getId() === null) {
			throw new \Exception("Não é possível atualizar qualquer coisa, se não temos um ID de cartão!");
		}

		$sql = $this->connection();

		try{
			$where = new Where();
			$where->equalTo('id', $data->getId());
			$update = $sql->update();

			$update->where($where);
			$update->set(array(
				'color' => $data->getColor(),
				'type' => $data->getType(),
				'value' => $data->getValue()
			));

			$statement = $sql->prepareStatementForSqlObject(
				$update
			);

			$result = $statement->execute();

			return $result->getAffectedRows() > 0;
		}catch(\Exception $e) {
			return false;
		}
	}
}