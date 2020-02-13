<?php

namespace App\Wx\Controllers;

use App\Article;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        $article->increment('view');
        $uid = \request()->get('uid') ?? 1;
        $user = $this->getUserByUid($uid);
        return view('wx.article', \compact('article', 'user'));
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->simplePaginate(16);
        return view('wx.articles', \compact('articles'));
    }
}
