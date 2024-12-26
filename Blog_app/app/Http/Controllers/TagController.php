<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $tags = Tag::paginate(10);
    return view('admin.tag.index', compact('tags'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    return view('admin.tag.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $tag = new Tag();
    $tag->name = $request->name;
    $tag->save();

    return redirect()->route('tags.index')->with('success', 'Le tag a bien été créé');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('article.index');
    }

    $tag = Tag::findOrFail($id);
    $tag->delete();

    return redirect()->route('tags.index')->with('success', 'Le tag a bien été supprimé');
  }
}
