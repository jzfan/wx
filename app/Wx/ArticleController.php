<?php

namespace App\Wx;

use App\Article;
use App\Http\Controllers\Controller;
use EasyWeChat\Kernel\Messages\Article as MsgArticle;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('wx.article', \compact('article'));
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('wx.articles', \compact('articles'));
    }
}
