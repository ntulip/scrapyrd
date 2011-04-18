<?php

namespace Fuel\Migrations;

class Initialize_setting {

	public function up()
	{
		\DB::insert('settings')->set(array(
			'last_short_id' => '',
			'site_enabled'  => 1,
		))->execute();
	}

	public function down()
	{
		\DB::delete('settings')->where('id', '=', 1)->execute();
	}
}