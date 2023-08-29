<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return Category::all();
    }


    public function store(Request $request)
    {
        $category = Category::create([
            ...$request->validate([
                'name' => 'required|string|max:20',
                'desc' => 'required',
            ])
        ]);

        return $category;
    }

    public function show(Category $category)
    {
        $category->load('products');
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update(
            $request->validate([
                'name' => 'required|string|max:20',
                'desc' => 'required',
            ])
        );

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response(status: 204);
    }
}
