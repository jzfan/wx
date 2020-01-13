<?php

namespace App\Wx\Controllers;

use App\Wx\Gzh;
use App\Wx\Handlers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use EasyWeChat\Kernel\Messages\Transfer;
// use EasyWeChat\Kernel\Messages\Text;

class ServerController extends Controller
{
    public function index()
    {
        $app = Gzh::app();
        // $app->menu->delete();
         $app->menu->create($this->menu());

        $app->server->push(function ($message) use ($app) {
            switch ($message['MsgType']) {
                case 'event':
                    // return \json_encode($message);
                    return (new Handlers\EventHandler)->handle($message);
                    break;
                case 'text':
                    // Log::info(\json_encode($kf['kf_list']));
                    // return \json_encode($kf['kf_list'][0]);
                    // return new Transfer();
                    $wx = Gzh::app()->user->get($message['FromUserName']);
                    $kfMsg = '收到用户 ' . $wx['nickname'] . "留言： \n" . $message['Content'];
                    // $kf = $app->customer_service->list();
                    // foreach ($kf['kf_list'] as $kefu) {
                    // }
                    $app->customer_service->message($kfMsg)->to(env('WECHAT_KF'))->send();
                    // return '已收到留言，客服人员处理中...';
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
