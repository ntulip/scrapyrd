<?php

namespace Fuel\Migrations;

class Create_scraps {

	public function up()
	{
		\DBUtil::create_table('scraps', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'type' => array('constraint' => 255, 'type' => 'varchar'),
			'contents' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
			'short_id' => array('constraint' => 255, 'type' => 'varchar'),
			'private' => array('constraint' => 1, 'type' => 'int'),
			'views' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('scraps');
	}
}