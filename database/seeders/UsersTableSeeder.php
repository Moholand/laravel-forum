<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
				'name' => 'mohammad',
				'email' => 'mohammad@gmail.com',
				'password' => bcrypt('123456789'),
				'admin' => 1,
				'avatar' => asset('avatars/avatar.jpg'),
		]);
	}
}
