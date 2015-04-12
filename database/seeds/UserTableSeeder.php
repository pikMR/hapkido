<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder{
    
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<30;$i++)
        {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
       $id = \DB::table('users')->insertGetId(array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $faker->unique()->email,
            'password' => \Hash::make('secret123'),
            'type' => $faker->randomElement(array_keys(config('options.types'))),
            'active' => false,
            'full_name' => "$firstName $lastName"
        ));
        
        \DB::table('user_profiles')->insert(array(
            'user_id' => $id,
            'bio' => $faker->paragraph(rand(2,5)),
            'website' => 'http://www.' . $faker->domainName,
            'birthdate'=> $faker->dateTimeBetween($startDate='-45 years','-15 years')->format('Y-m-d'),
            'taquilla' => $faker->optional()->randomLetter,
            'phone' => $faker->numberBetween($min = 600000000, $max = 699999999),
            'twitter' => 'http://twitter.com/' . $faker->userName,
        ));
        }
    }
}