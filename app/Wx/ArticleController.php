<?php

namespace App\Wx;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $user = request()->session()->get('wechat.oauth_user.default');
        return view('wx.article', \compact('article', 'user'));
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
