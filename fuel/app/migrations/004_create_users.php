<?php

namespace Fuel\Migrations;

class Create_users {

	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'screen_name' => array('constraint' => 255, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'avatar' => array('type' => 'text'),
			'oauth_token' => array('constraint' => 255, 'type' => 'varchar'),
			'oauth_token_secret' => array('constraint' => 255, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}