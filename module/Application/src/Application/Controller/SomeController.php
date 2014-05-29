<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SomeController extends AbstractActionController
{
	public function indexAction()
	{
		/*$db = $this->getServiceLocator()->get('db');

		$query = $db->query('SELECT * FROM table');*/

		$dbOne = $this->getServiceLocator()->get('db_one');
		$dbOne = $this->getServiceLocator()->get('db_two');
	}
}