<?php

use Illuminate\Database\Seeder;

class SuggestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\SuggestProduct::class, 100)->create();
    }
}
