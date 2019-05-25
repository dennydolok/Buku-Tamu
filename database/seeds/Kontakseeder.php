<?php

use Illuminate\Database\Seeder;
use App\Kontak;
use Faker\Factory;

class Kontakseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();
    	for ($i=0; $i <99 ; $i++) { 
    		Kontak::create([
    			'nama'=>$faker->name,
    			'email'=>$faker->email,
    			'foto'=>$faker->text
    		]);
    	}
    }
}
