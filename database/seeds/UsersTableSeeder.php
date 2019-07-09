<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->truncate();
		App\User::create([
			'name' => 'hungdz',
			'email' => 'tronghungbo@gmail.com',
			'admin' => '1',
			'address' => 'Hà Nội',
			'mobile' => '0362188088',
			'password' => bcrypt('12345678'),
		]);
	}
}
