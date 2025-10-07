<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category($request->validated());
        $category->save();
        return response()->json(['success' => true, 'category' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(['success' => true, 'category' => $category->load('products')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($category->update($request->validated())) {
            return response()->json(['success' => true, 'category' => $category], 200);
        }
        return response()->json(['success' => false, 'category' => $category], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function getActiveCategories()
    {
        $activeCategories = Category::where('status', true)
                                    ->with('products')
                                    ->get();

        return response()->json([
            'success' => true,
            'categories' => $activeCategories
        ], 200);
    }
}
