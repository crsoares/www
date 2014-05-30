<?php

namespace Comment\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$view = new ViewModel();

		$comments = array();

		for($i = 0; $i < 10; $i++) {
			$comments[] = array(
				'name' => 'Crysthiano ('.$i.')',
				'comment' => 'Estudos zend framework 2'
			);
		}

		return $view->setVariable('comments', $comments)
					->setTerminal(true);
	}
}