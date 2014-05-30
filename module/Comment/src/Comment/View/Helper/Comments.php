<?php

namespace Comment\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Comment\Controller\IndexController;

class Comments extends AbstractHelper
{
	public function __invoke()
	{
		$controller = new IndexController();

		$model = $controller->indexAction()->setTemplate(
			'comment/index/index'
		);

		return $this->getView()->render($model);

		/*return $view->setVariable('comments', $comments)
					->setTerminal(true);*/
	}
}