<?php

use Illuminate\Database\Seeder;

class BlueprintDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\BlueprintDetail::class, 100)->create();
    }
}
