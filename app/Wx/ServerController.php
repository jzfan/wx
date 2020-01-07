<?php

namespace App\Wx;

use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use App\Wx\Handlers;
use EasyWeChat\Kernel\Messages\Article as MsgArticle;
use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

class ServerController extends Controller
{
    public function index()
    {
        $config = [
            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID'),
            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET'),
            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN'),
            'response_type' => 'array',
            //...
        ];

        $app = Factory::officialAccount($config);
        // $app->menu->delete();
        $app->menu->create($this->menu());

        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    return (new Handlers\EventHandler)->handle($message);
                    break;
                case 'text':
                    return Gzh::userInfo();
                    // return '收到文字消息';
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
<<<<<<< Updated upstream
            "name"=>"文章推荐",
            "sub_button"=>[
            [	
                "type"=>"click",
                "name"=>"最新文章",
                "key"=>"recent-articles"
            ],
             [
                  "type"=>"click",
                  "name"=>"历史文章",
                  "key"=>"all-articles"
             ],
=======
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
                    "key" => "http://card.aa086.com/wx/articles"
                ],
>>>>>>> Stashed changes
            ],
            [
                "type" => "click",
                "name" => "个人中心",
                "key" => "me"
            ]
        ];      
    }
}
