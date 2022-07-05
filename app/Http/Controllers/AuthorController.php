<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    public function store(Request $request)
    {
        $author = new Author();
        $author->author = $request->author;
        $author->save();
        return response()->json('Row Inserted');
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->author = $request->author;
        $author->save();
        return response()->json('Row Updated');
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        return response()->json('Row Deleted');
    }
}
