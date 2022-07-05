<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json($genre);
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->genre = $request->genre;
        $genre->save();
        return response()->json('Row Inserted');
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->genre = $request->genre;
        $genre->save();
        return response()->json('Row Updated');
    }

    public function delete($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return response()->json('Row Deleted');
    }
}
