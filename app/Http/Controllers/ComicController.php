<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Tag;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return response()->json($comics);
    }

    public function show($id)
    {
        $comic = Comic::find($id);
        return response()->json($comic);
    }
    

    /**
     * Modul ini digunakan untuk melakukan storing data ke dalam table comic
     */
    public function store(Request $request)
    {
        $comic = new Comic();
        $comic->genre_id        = $request->genre_id;
        $comic->author_comic_id = $request->author_comic_id;
        $comic->title           = $request->title;
        $comic->alternate_title = $request->alternate_title;
        $comic->status_comic    = $request->status_comic;
        $comic->format_comic    = $request->format_comic;
        $comic->type_comic      = $request->type_comic;
        $comic->rating          = $request->rating;
        $comic->reads           = $request->reads;
        $comic->cover           = $request->cover;
        $comic->save();

        $tags = $request->tags;
        foreach($tags as $tag){
            $comic->tag()->attach($tag);
        }
        // 
        return response()->json('Row Inserted!');
    }

    public function update(Request $request, $id)
    {
        $comic = Comic::find($id);
        $comic->genre_id        = $request->genre_id;
        $comic->author_comic_id = $request->author_comic_id;
        $comic->title           = $request->title;
        $comic->alternate_title = $request->alternate_title;
        $comic->status_comic    = $request->status_comic;
        $comic->format_comic    = $request->format_comic;
        $comic->type_comic      = $request->type_comic;
        $comic->rating          = $request->rating;
        $comic->reads           = $request->reads;
        $comic->cover           = $request->cover;
        $comic->save();

        $comic->tag()->detach();

        $tags = $request->tags;
        foreach($tags as $tag){
            $comic->tag()->attach($tag);
        }
        return response()->json('Row Updated!');
    }
}