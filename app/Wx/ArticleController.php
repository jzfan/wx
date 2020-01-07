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
        $articles = Article::orderBy('id', 'desc')->simplePaginate(16);
        return view('wx.articles', \compact('articles'));
    }

    public function list()
    {
        $page = request('page');
        $articles = Article::orderBy('id', 'desc')->paginate($page, 16);
        return $articles;
    }
}
