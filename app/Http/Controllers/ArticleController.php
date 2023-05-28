<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{
    public const ARTICLES_PER_PAGE = 15;

    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(self::ARTICLES_PER_PAGE);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(ArticleFormRequest $request)
    {
        $article = Article::create($request->articleFields());
        $article->syncTags(explode(',', $request->tags));

        return redirect()->route('admin.articles.show', compact('article'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = implode(',', array_map(fn ($tag) => $tag['name'], $article->tags->toArray()));
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update($request->articleFields());
        $article->syncTags(explode(',', $request->tags));

        return redirect()->route('admin.articles.edit', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }
}