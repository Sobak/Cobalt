<?php

class InstallController extends BaseController {
	public function getInstall()
	{
		// @todo: it's only temporary
		return $this->createDatabase();
	}

	protected function createDatabase()
	{
		Schema::create('settings', function($table)
		{
			$table->increments('id');
			$table->string('name', 32)->unique();
			$table->text('value');
			$table->enum('type', array('boolean', 'input', 'text'));
			$table->string('description');
		});

		$defaultSettings = [
			[
				'name' => 'site_title',
				'value' => 'Site title',
				'type' => 'input',
				'description' => 'Site title'
			]
		];

		DB::table('settings')->insert($defaultSettings);

		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 32)->unique();
			$table->string('password', 60);
			$table->string('email')->unique();
			$table->enum('level', array('user', 'admin'))->default('user');
			$table->string('remember_token', 100)->nullable();
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
			$table->string('slug', 100)->unique();
			$table->string('read_more');
			$table->text('content');
			$table->timestamps();
		});

		return 'Done!';
	}
}
