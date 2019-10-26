<?php

use Illuminate\Database\Seeder;

class AdsTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Ad::class,100)->create();
    }
}
