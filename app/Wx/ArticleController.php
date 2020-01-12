<?php

namespace App\Wx;

use App\User;
use App\Article;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        // $aid = 
        $user = $this->mapUser();
        return view('wx.article', \compact('article', 'user'));
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->simplePaginate(16);
        return view('wx.articles', \compact('articles'));
    }
}
