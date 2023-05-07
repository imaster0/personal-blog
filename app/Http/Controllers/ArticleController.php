<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(ArticleFormRequest $request)
    {
        $article = Article::create($request->validated());
        return redirect()->route('admin.articles.show', compact('article'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update($request->validated());
        return redirect()->route('admin.articles.edit', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}