<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(SubCategoryTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
         $this->call(BrandTableSeeder::class);
         $this->call(TagTableSeeder::class);
         $this->call(MediaTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
         $this->call(StoriesTableSeeder::class);
    }
}
