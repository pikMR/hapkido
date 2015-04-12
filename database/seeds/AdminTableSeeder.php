<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class AdminTableSeeder extends Seeder{
    
    public function run()
    {
        $faker = Faker::create();
        $firstname = 'Maestro' . $faker->firstName;
        $lastname = $faker->lastName;
        
        $id=\DB::table('users')->insert(array(
            
            'first_name' => $firstname,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => \Hash::make('123456'),
            'type' => 'admin',
            'active' => true,
            'full_name' => "$firstname $lastname"
            ));
        
          \DB::table('user_profiles')->insert(array(
            'user_id' => $id,
            'bio' => 'HAP-KI-DO',
            'website' => 'http://www.hapkidomurcia.es',
            'birthdate'=> '1987/12/14',
            'phone' => '666666666',
            'taquilla' => $faker->optional()->randomLetter,
            'twitter' => 'http://twitter.com/' . 'HAPKIDO_MURCIA'
        ));
    }
    
    
    
}