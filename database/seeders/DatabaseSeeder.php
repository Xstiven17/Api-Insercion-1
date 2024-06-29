<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Tag;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);
        Categories::factory(4)->create();
        TagFactory::factory(8)->create();
        $this->call(PostSeeder::class);

    }
}