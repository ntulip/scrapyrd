<?php

namespace Fuel\Migrations;

class Add_user_id_to_scraps {

	public function up()
	{
		\DB::query('ALTER TABLE `scraps` ADD `user_id` INT(11) NULL')->execute();
	}

	public function down()
	{
		\DB::query('ALTER TABLE `scraps` DROP COLUMN `user_id`')->execute();
	}
}