<?php

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class,5)->create();
        $countries = Country::all();
        factory(City::class,50)->create()->each(function ($city) use($countries){
            $city->country()->associate($countries->random());
            $city->save();
        });
    }
}
