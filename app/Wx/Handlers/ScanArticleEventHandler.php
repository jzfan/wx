<?php

namespace App\Wx\Handlers;

use App\User;
use App\Wx\Gzh;
use App\Article;

use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

class ScanArticleEventHandler
{
    public function handle($msg)
    {
        $aid = $msg['EventKey'];
        $article = Article::find($aid);

        $notice = <<<heredoc
            文章已添加您的名片  ↘ 请领取 
        heredoc;

        Gzh::app()->customer_service->message($notice)->to($msg['FromUserName'])->send();
        $user = $this->getUserByOpenid($msg['FromUserName']);

        $items = [
            new NewsItem([
                'title'       => $article->title,
                'description' => \substr($article->content, 0, 22),
                // 'description' => $this->getCover($article),
                'url'         => env('APP_URL') . '/wx/articles/' . $aid . '?uid=' . $user->id,
                'image'       => $this->getCover($article),
            ]),
        ];
        return new News($items);
    }

    protected function getCover($article)
    {
        if ($article->cover) {
            return env('APP_URL') . $article->cover;
        }
        return env('APP_URL') . '/img/article.jpg';
    }

    protected function getUserByOpenid($openid)
    {
        if (\session('user')) {
            return \session('user');
        }
        $wx = Gzh::app()->user->get($openid);

        $user = User::firstOrCreate([
            'openid' => $openid
        ], [
            'name' => $wx['nickname'],
            'avatar' => $wx['headimgurl'],
            'password' => ''
        ]);
        session(['user' => $user]);
        return $user;
    }
}
