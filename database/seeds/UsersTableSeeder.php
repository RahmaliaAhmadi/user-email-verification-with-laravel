<?php

use Illuminate\Database\Seeder;
use App\User;
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
        		'username' => 'example_username',
        		'password' => bcrypt('example_password'),
        		'email' => 'johndoe@examplemail.com',
        		'type' => 1,
        		'name' => 'John Doe',
        		'created_at' => Date('Y-m-d h:i:s'),
        		'verified' => true
        	]);
    }
}
