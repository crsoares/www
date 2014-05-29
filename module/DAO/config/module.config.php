<?php

return array(
	'dao' => array(
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'book',
		'mapper' => array(
			'Cards' => 'cards',
		),
	),
	'service_manager' => array(
		'invokables' => array(
			'DAO_Connector' => 'DAO\Db\Connection\Connector',
			'DAO_Mapper_Cards' => 'DAO\Db\Mapper\Cards'
		)
	)

);