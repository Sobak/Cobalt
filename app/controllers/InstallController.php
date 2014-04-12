<?php

class InstallController extends BaseController {
	public function getInstall()
	{
		// @todo: it's only temporary
		return $this->createDatabase();
	}

	protected function createDatabase()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 32)->unique();;
			$table->string('password', 60);
			$table->string('email')->unique();
			$table->enum('level', array('user', 'admin'));
			$table->timestamps();
		});
		
		$user = new User;
		$user->username = 'admin';
		$user->password = Hash::make('admin');
		$user->level = 'admin';
		$user->save();

		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title', 100);
			$table->string('slug', 100)->unique();;
			$table->string('read_more');
			$table->text('content');
			$table->timestamps();
		});

		return 'Done!';
	}
}
