<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CommentController extends AbstractActionController
{
	public function helperAction()
	{
		return new ViewModel();
	}

	public function forwardAction()
	{
		$view = new ViewModel();

		$comments = $this->forward()
						 ->dispatch(
						 	'Comment\Controller\Index',
						 	array('action' => 'index')
						 );

		$comments->setTerminal(false);

		return $view->addChild($comments, 'comments');
	}

	public function ajaxAction()
	{
		return new ViewModel();
	}
}