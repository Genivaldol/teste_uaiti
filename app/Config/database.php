<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => false,
		'prefix' => '',
		//'encoding' => 'utf8',
	);
        

	public $uaiti = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'uaiti',
		'prefix' => '',
		//'encoding' => 'utf8'
	);
}
