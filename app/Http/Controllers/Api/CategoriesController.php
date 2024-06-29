<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       //$categories=Category::all();
      // $categories=Category::included()->get();
    // $categories=Category::included()->filter();
    //  $categories=Category::included()->filter()->sort()->get();
      $categories=Categories::included()->filter()->sort()->getOrPaginate();
       return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories',
            
        ]);

        $category=Categories::create($request->all());

        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)//si se pasa $id se utiliza la comentada
    {   
      // $category = Category::findOrFail($id);
     // $category = Category::with(['posts.user'])->findOrFail($id);
     // $category = Category::with(['posts'])->findOrFail($id);
      
     // $category = Category::included();
       $category = Categories::included()->findOrFail($id);
       return $category;
//http://api.codersfree1.test/v1/categories/1/?included=posts.user

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,'.$categories->id,
            
        ]);

        $categories->update($request->all());

        return $categories;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return $category;
    }
}

