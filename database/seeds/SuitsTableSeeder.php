<?php

use Illuminate\Database\Seeder;

class SuitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Suit::class, 10)->create();
    }
}
