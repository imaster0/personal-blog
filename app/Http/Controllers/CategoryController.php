<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Article::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(ArticleFormRequest $request)
    {
        $article = Article::create($request->validated());
        return redirect()->route('categories.show', compact('article'));
    }

    public function show(Article $article)
    {
        return view('categories.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('categories.edit', compact('article', 'categories'));
    }

    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update($request->validated());
        return redirect()->route('categories.edit', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('categories.index');
    }
}