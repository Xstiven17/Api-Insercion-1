<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories',
            
        ]);

        $category=Category::create($request->all());

        return response($category, 200);
    }
}
