<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('welcome', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        return view('article', compact('article'));
    }
}
