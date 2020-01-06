<?php

namespace App\Wx\Handlers;

use App\User;

class EventHandler
{
    protected $msg;

    public function handle($msg)
    {
        if ($msg['Event'] === 'subscribe') {
            return $this->onSubscribe($msg);
        }
        if ($msg['Event'] === 'CLICK' && $msg['EventKey'] === 'recent-articles') {
            return (new RecentArticlesEventHandler)->handle();
        }
        return 'event handled';
    }

    public function onSubscribe($msg)
    {
        $user = User::firstOrCreate([
            'openid' => $msg['FromUserName']
        ], [
            'name' => '微信用户' . substr($msg['FromUserName'], 0, 5),
        ]);
        return $user->name;
    }

    public function onClickRecentArticles()
    {
        $articles = \App\Article::orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $str = '';
        foreach ($articles as $a) {
            $str .= "<a href='http://card.aa086.com/wx/articles/$a->id'>$a->title</a>\n\n";
        }
        return $str;
    }
}
