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
		'type'			=> 'mysql',
		'connection'	=> array(
			'hostname'   => '127.0.0.1',
			'database'   => 'scrapyrd',
			'username'   => 'root',
			'password'   => '',
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
			'hostname'   => '/tmp/mysql/myrle.sock',
			'database'   => 'myrle',
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