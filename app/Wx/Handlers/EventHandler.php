<?php

namespace App\Wx\Handlers;

use App\User;

class EventHandler
{
    protected $msg;

    public function handle($msg)
    {
        if ($msg['Event'] === 'SCAN') {
            return (new ScanArticleEventHandler)->handle($msg);
        }
        if ($msg['Event'] === 'subscribe') {
            return $this->onSubscribe($msg);
        }
        if ($msg['Event'] === 'CLICK' && $msg['EventKey'] === 'recent-articles') {
            return (new RecentArticlesEventHandler)->handle();
        }
        return 'event handled';
    }

    protected function onSubscribe($msg)
    {
        $user = User::firstOrCreate([
            'openid' => $msg['FromUserName']
        ], [
            'name' => '微信用户' . substr($msg['FromUserName'], 0, 5),
        ]);
        if (isset($msg['EventKey'])) {
            return $this->onScene($msg);
        }
        return $user->name . ', 欢迎您的关注!';
    }

    protected function onClickRecentArticles()
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

    protected function onScene($msg)
    {
        session('scene', $msg['EventKey']);
        return $msg['EventKey'];
    }
}
