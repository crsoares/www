<?php

namespace DAO\Db\Mapper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;

class MapperAbstract implements ServiceLocatorAwareInterface
{
	private $sqlObject;
	protected $serviceLocator;

	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}

	public function getSqlObject()
	{
		if($this->connection === null) {
			$config = $this->getServiceLocator()->get('config');

			$class = explode('\\', get_class($this));

			if(isset($config['dao']['mapper']) === true && isset($config['dao']['mapper'][end($class)])) {
				$adapter = $this->getServiceLocator()->get('DAO_Connector')->initialize();

				$this->sqlObject = new Sql($adapter, $config['dao']['mapper'][end($class)]);

			} else {
				throw new \Exception("configuração dao\mapper\\" . end($class) . " não definido.");
			}
		}

		return $this->sqlObject;
	}
}