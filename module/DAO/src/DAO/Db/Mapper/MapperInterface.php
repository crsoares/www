<?php

namespace DAO\Db\Mapper;

interface MapperInterface
{
	public function insert($data);

	public function update($data);

	public function delete($id);

	public function load($id);

	public function getAll();
}