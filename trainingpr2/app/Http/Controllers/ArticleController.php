<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\category;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $articles = Article::all();

        return view('home', compact('articles'));
    }
    public function show(){
        $articles = Article::all();

        return view('show', compact('articles'));
    }
    public function showa($id)
    {
        $article = Article::findOrFail($id);

        return view('showartic', compact('article'));
    }
    public function create()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('create', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);

        $filename = $request->file('image') ? $request->file('image')->store('public/images') : null;

        Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $filename,
            'category_id' => $request->category_id,
            'tags' => 'array',
        ]);


        return redirect()->route('show')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $tags = tags::all();
        $categories = Category::all();
        return view('edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);

        $filename = $request->file('image') ? $request->file('image')->store('public/images') : $article->image;

        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $filename,
            'category_id' => $request->category_id,
            'tags' => 'array',
        ]);

        return redirect()->route('show')->with('success', 'Article updated successfully.');
    }
    public function destroy(Article $article)
    {
        if ($article->image && Storage::exists($article->image)) {
            Storage::delete($article->image);
        }

        $article->delete();
        return redirect()->route('show')->with('success', 'Article deleted successfully.');
    }
}
