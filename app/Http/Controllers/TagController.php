<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('backpanel.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tags = Tag::create($request->only('name'));
        return redirect()->route('tag.index')->with('success' , $tags->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
       return view('backpanel.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->only('name'));
        return redirect()->route('tag.index')->with('success' , $tag->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with('success' , $tag->name . ' deleted  successfully');
    }

    public function trashedTag()
    {
        return view('backpanel.tags.trashed')->with('tags', Tag::onlyTrashed()->get());
    }

    public function restoreTag($id)
    {
        $tag = Tag::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('tag.index')->with('success',  'restored successfully');
    }
   
    
    public function forceDeleteTag($id)
    {
        $tag = Tag::withTrashed() 
            ->where('id', $id)
            ->forceDelete();
        return redirect()->route('tag.index')->with('success',  'tag Deleted Permanently');
    }
}
