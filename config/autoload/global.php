<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    /*'service_manager' => array(
    	'factories' => array(
    		'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
    	),
    	'aliases' => array(
    		'db' => 'Zend\Db\Adapter\Adapter'
    	)
    ),
    'db' => array(
    	'driver' => 'pdo',
    	'dsn' => 'mysql:dbname=book;host=localhost',
    	'username' => 'root',
    	'password' => ''
    )*/

	'db' => array(
		'adapters' => array(
			'db_one' => array(
				'driver' => 'pdo',
				'dsn' => 'mysql:dbname=app;host=localhost',
				'username' => 'root',
				'password' => ''
			),
			'db_two' => array(
				'driver' => 'pdo',
				'dsn' => 'mysql:dbname=book;host=localhost',
				'username' => 'root',
				'password' => ''
			)
		)
	),
	'service_manager' => array(
		'abstract_factories' => array(
			'Zend\Db\Adapter\AdapterAbstractServiceFactory',
		)
	)
);
