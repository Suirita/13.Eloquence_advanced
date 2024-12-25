<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;


class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    $categories = \App\Models\Category::all();
    $tags= \App\Models\Tag::all();
    $articles = \App\Models\Article::paginate(10);

    if(Auth::check() && Auth::user()->roles->contains('name', 'admin')){
      
      return view('admin.index', compact('articles' , 'categories', 'tags'));
    }else{
      return view('public.index');
    }
  
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'category' => 'required|string|max:255',
      'tags' => 'nullable|string',
      'content' => 'required|string',
    ]);

    $article = new Article();
    $article->title = $request->title;
    $article->category = $request->category;
    $article->content = $request->content;
    $article->user_id = Auth::id();
    $article->save();

    if ($request->filled('tags')) {
      $tags = explode(',', $request->tags);
      $tagIds = [];
      foreach ($tags as $tagName) {
        $tagName = trim($tagName);
        if (!empty($tagName)) {
          $tag = Tag::firstOrCreate(['name' => $tagName]);
          $tagIds[] = $tag->id;
        }
      }
      $article->tags()->attach($tagIds);
    }
    
    return redirect()->route('articles.index')->with('success', 'L\'article a bien été créé');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $article = Article::where('id', $id)->firstOrFail();
    if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
      return view('admin.show', compact('article'));
    } else {
      return view('public.show', compact('article'));
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $article = Article::findOrFail($id);
    $tags = $article->tags->pluck('name')->toArray();

    return view('admin.edit', [
      'article' => $article,
      'tags' => implode(',', $tags),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'category' => 'required|string|max:255',
      'tags' => 'nullable|string',
      'content' => 'required|string',
    ]);

    $article = Article::findOrFail($id);

    $article->title = $request->title;
    $article->category = $request->category;
    $article->content = $request->content;
    $article->save();

    if ($request->filled('tags')) {
      $tags = explode(',', $request->tags);
      $tagIds = [];
      foreach ($tags as $tagName) {
        $tagName = trim($tagName);
        if (!empty($tagName)) {
          $tag = Tag::firstOrCreate(['name' => $tagName]);
          $tagIds[] = $tag->id;
        }
      }
      $article->tags()->sync($tagIds);
    } else {
      $article->tags()->detach();
    }

    return redirect()->route('articles.index')->with('success', 'L\'article a bien été modifié');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
    $article = Article::where('id', $id);
    $article->delete();
    return redirect()->route('articles.index')->with('success', 'L\'article a bien été supprimé');
  }
}
