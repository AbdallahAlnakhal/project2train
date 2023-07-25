<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\tags;
use Illuminate\Http\Request;

class ArticleTagController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $tags = tags::all();
        return view('aticaletag/index', compact('articles', 'tags'));
    }
    public function create()
    {
        $articles = Article::all();
        $tags = tags::all();
        return view('aticaletag.createat', compact('articles', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'tag_id' => 'required|exists:tags,id',
        ]);

        $article = Article::findOrFail($request->article_id);
        $article->tags()->attach($request->tag_id);

        return redirect()->route('article_tags.index')->with('success', 'Tag added to article successfully.');
    }

//

}
