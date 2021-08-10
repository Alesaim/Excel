<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;	

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,5000) as $value) {
    		DB::table('tests')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'address' => $faker->address,
	        ]);
    	}        
    }
}
