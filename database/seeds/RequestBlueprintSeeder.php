<?php

use Illuminate\Database\Seeder;

class RequestBlueprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\RequestBlueprint::class, 20)->create();
    }
}
