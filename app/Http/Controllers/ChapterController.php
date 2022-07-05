<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    
    public function index()
    {
        $chapters = Chapter::all();
        return response()->json($chapters);
    }

    public function show($id)
    {
        $chapter = Chapter::findOrFail($id);
        return response()->json($chapter);
    }

    public function store(Request $request)
    {
        $chapter = new Chapter();
        $chapter->chapter = $request->chapter;
        $chapter->comic_id = $request->comic_id;
        $chapter->save();
        return response()->json('Row Inserted');
    }

    public function update(Request $request, $id)
    {
        $chapter = Chapter::find($id);
        $chapter->chapter = $request->chapter;
        $chapter->save();
        return response()->json('Row Updated');
    }

    public function delete($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        return response()->json('Row Deleted');
    }
}
