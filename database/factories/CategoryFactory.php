<?php

namespace Database\Factories;

use App\Http\Resources\CategoriesResourse;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
   
    protected $model=CategoriesResourse::class;

    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        
        return [
            'name'=>$name,
            'slug'=>Str::slug($name)
        ];
    }
}