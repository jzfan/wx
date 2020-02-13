<?php

// use Guzzle\Http\Client;

// function copyRemote($fromUrl, $toFile)
// {
//     try {
//         $client = new Client();
//         $response = $client->get($fromUrl)
//             ->setResponseBody('')
//             ->send();
//         return true;
//     } catch (Exception $e) {
//         // Log the error or something
//         return false;
//     }
// }

function _get_extension($url)
{
    // mime 和 扩展名 的映射
    $mimes = array(
        'image/bmp' => 'bmp',
        'image/gif' => 'gif',
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/x-icon' => 'ico'
    );
    $headers = get_headers($url, 1);
    if (!isset($mimes[$headers['Content-Type']])) {
        $this->my_json(0, '未知媒體類型');
    }
    return $mimes[$headers['Content-Type']];
}

function http_get_data($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();
    return $return_content;
}

function _save_weixin_avatar($url)
{
    if ($url) {
        $ext = $this->_get_extension($url);

        //定义文件名
        $filename = date('Y-m-d-h-i-s') . mt_rand(10000, 99999) . '.' . $ext;

        //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
        Storage::disk('uploads')->put($filename, $this->http_get_data($url));
        return '/uploads/thumb/' . $filename;
    } else {
        $this->my_json(0, '请检查参数');
    }
}
