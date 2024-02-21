<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backpanel.categories.index')
            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $category = Category::create($data);

        return redirect()->route('category.index')->with('success', $category->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Request $req)
    {
        return view('backpanel.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = [
            "name" => $request->name,
        ];

        $category->update($data);
        return redirect()->route('category.index')->with('success', $category->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', ' deleted successfully');
    }


    public function trashedCategory()
    {
        return view('backpanel.categories.trashed')->with('categories', Category::onlyTrashed()->get());
    }


    public function restoreCategory($id)
    {
        $category = Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('category.index')->with('success',  'restored successfully');
    }
   
    
    public function forceDeleteCategory($id)
    {
        $category = Category::withTrashed() 
            ->where('id', $id)
            ->forceDelete();
        return redirect()->route('category.index')->with('success',  'category Deleted Permanently');
    }
}
