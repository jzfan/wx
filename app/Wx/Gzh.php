<?php

namespace App\Wx;

use EasyWeChat\Factory;

class Gzh
{
    public static function app()
    {
        $config = [
            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID'),
            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET'),
            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN'),
            'response_type' => 'array',
            //...
        ];
        return Factory::officialAccount($config);
    }

    public static function getForeverQrcode($id)
    {
        $app = self::app();

        $result = $app->qrcode->forever($id);
        $url = $app->qrcode->url($result['ticket']);
        $content = file_get_contents($url); // 得到二进制图片内容
        $path = "/qrcode/$id.jpg";
        file_put_contents(\public_path($path), $content); // 写入文件

        return $path;
    }
}
