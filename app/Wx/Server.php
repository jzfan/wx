<?php

namespace App\Wx\Controllers;

use App\Wx\Gzh;
use App\Wx\Handlers;
use App\Http\Controllers\Controller;
use EasyWeChat\Kernel\Messages\Transfer;

class Server extends Controller
{
    public function index()
    {
        $app = Gzh::app();
        // $app->menu->delete();
        // $app->menu->create($this->menu());

        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return (new Handlers\EventHandler)->handle($message);
                    break;
                case 'text':
                    return 'received';
                    // return new Transfer();
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                    // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

        return $app->server->serve();
    }


    protected function menu()
    {
        return [
            "name" => "文章推荐",
            "sub_button" => [
                [
                    "type" => "click",
                    "name" => "最新文章",
                    "key" => "recent-articles"
                ],
                [
                    "type" => "view",
                    "name" => "历史文章",
                    "url" => "http://card.aa086.com/wx/articles"
                ],
            ],
            [
                "type" => "view",
                "name" => "个人中心",
                "url" => "http://card.aa086.com/wx/ucenter"
            ]
        ];
    }
}
