<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $article = Article::where('id', $id)->firstOrFail();
    if (Auth::check() && Auth::user()->role == 'admin') {
      return view('admin.show', compact('article'));
    } else {
      return view('public.show', compact('article'));
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
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
