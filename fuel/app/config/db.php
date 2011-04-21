<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

return array(
	'active' => Config::get('environment'),

	'dev' => array(
		'type'			=> 'pdo',
		'connection'	=> array(
			'dsn'   => 'mysql:host=localhost;dbname=myrle;unix_socket=/tmp/mysql/myrle.sock',
			'username'   => isset($_SERVER['DB_USERNAME']) ? $_SERVER['DB_USERNAME'] : '',
			'password'   => isset($_SERVER['DB_USERNAME']) ? $_SERVER['DB_PASSWORD'] : '',
			'persistent' => false,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => false,
	),

	'production' => array(
		'type'			=> 'mysql',
		'connection'	=> array(
			'dsn'   => 'mysql:host=localhost;dbname=myrle;unix_socket=/tmp/mysql/myrle.sock',
			'username'   => isset($_SERVER['DB_USERNAME']) ? $_SERVER['DB_USERNAME'] : '',
			'password'   => isset($_SERVER['DB_USERNAME']) ? $_SERVER['DB_PASSWORD'] : '',
			'persistent' => false,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => false,
	),
);

/* End of file db.php */