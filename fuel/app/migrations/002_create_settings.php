<?php

namespace Fuel\Migrations;

class Create_settings {

	public function up()
	{
		\DBUtil::create_table('settings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'last_short_id' => array('constraint' => 255, 'type' => 'varchar'),
			'site_enabled' => array('constraint' => 1, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('settings');
	}
}