<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public const ARTICLES_PER_PAGE = 5;
    public function index()
    {
        $articles = Article::with('category', 'tags')->latest()->paginate(self::ARTICLES_PER_PAGE);
        return view('welcome', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        return view('article', compact('article'));
    }
}
