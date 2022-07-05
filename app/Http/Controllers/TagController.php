<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->genre = $request->genre;
        $tag->save();
        return response()->json('Row Inserted');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->genre = $request->genre;
        $tag->save();
        return response()->json('Row Updated');
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json('Row Deleted');
    }
}
