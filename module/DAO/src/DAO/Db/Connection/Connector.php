<?php

namespace DAO\Db\Connection;

use Zend\ServiceManager\ServiceLocatorAwareIterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class Connector implements ServiceLocatorAwareInterface
{
	protected $serviceLocator;

	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}

	public function initialize()
	{
		$dao = $this->getServiceLocator()->get('config');

		$configItems = array(
			'hostname',
			'username',
			'password',
			'database'
		);

		foreach($configItems as $required) {
			if(!in_array($required, array_keys($dao['dao']))) {
				throw new \Exception("{$required} não é no DAO configuração!");
			}
		}

		return new Adapter(array(
			'driver' => 'Pdo_Mysql',
			'database' => $dao['dao']['database'],
			'hostname' => $dao['dao']['hostname'],
			'username' => $dao['dao']['username'],
			'password' => $dao['dao']['password']
		));
	}
}