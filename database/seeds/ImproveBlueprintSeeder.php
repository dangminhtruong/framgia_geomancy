<?php

use Illuminate\Database\Seeder;

class ImproveBlueprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\ImproveBlueprint::class, 20)->create();
    }
}
