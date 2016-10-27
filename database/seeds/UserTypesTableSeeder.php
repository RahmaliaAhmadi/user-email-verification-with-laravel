<?php

use Illuminate\Database\Seeder;
use App\UserType;
class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = Date('Y-m-d h:i:s');
        UserType::insert([
        		[
        			'name' => 'administrator',
        			'created_at' => $now
        		],
        		[
        			'name' => 'default',
        			'created_at' => $now
        		],
        		[
        			'name' => 'member',
        			'created_at' => $now
        		]

        	]);
    }
}
