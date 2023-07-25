<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = tags::all();
        return view('tag.showTag', compact('tags'));
    }

    public function create()
    {
        return view('tag.createTag');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);

        tags::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(tags $tag)
    {
        return view('tag.editTag', compact('tag'));
    }

    public function update(Request $request, tags $tag)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(tags $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
