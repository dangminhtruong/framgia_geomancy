<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(BlueprintSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(BlueprintDetailSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SuggestProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ImproveBlueprintSeeder::class); 
        $this->call(ImproveDetailSeeder::class); 
        $this->call(RequestBlueprintSeeder::class);
    }
}
