<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}
class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(array('displayname'=>'admin',
						'username'=>'admin',
						'email'=>'admin@gmail.com',
						'password'=>Hash::make('admin123'),
						'active'=>'Y'));
	}
	
}
