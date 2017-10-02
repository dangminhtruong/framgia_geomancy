<?php

use Illuminate\Database\Seeder;

class ImproveDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\ImproveDetail::class, 20)->create();
    }
}
