<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;
use Database\Factories\ImageFactory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Post::factory(100)->create()->each(function(Post $post){
         
            ImageFactory::factory(4)->create([
                'imageable_id' => $post->id,
                'imageable_type'=>Post::class
            ]);
            $post->tags()->attach([
               rand(1,4),
               rand(5,8) 
        ]);
     }); 

    }
}