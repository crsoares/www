<?php

return array(
	'router' => array(
		'routes' => array(
			'comment' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/comment',
					'defaults' => array(
						'controller' => 'Comment\Controller\Index',
						'action' => 'index'
					)
				)
			)
		)
	),
	'controllers' => array(
		'invokables' => array(
			'Comment\Controller\Index' => 'Comment\Controller\IndexController',
		)
	),
	'view_helpers' => array(
		'invokables' => array(
			'comments' => 'Comment\View\Helper\Comments'
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		)
	)
);