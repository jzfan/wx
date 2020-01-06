<?php

namespace App\Wx\Handlers;

use App\Article;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

class RecentArticlesEventHandler
{
    public function handle()
    {  
        $articles = Article::orderBy('id', 'desc')
        ->limit(8)
        ->get();
        $str = '';
        foreach ($articles as $a) {
            $str .= "<a href='http://card.aa086.com/wx/articles/$a->id'>$a->title</a>\n\n";
        }
        return $str;

        // $items = [
        //     new NewsItem([
        //         // 'title'       => '新闻',
        //         'description' => 'some news...',
        //         'url'         => 'http://card.aa086.com/articles/22',
        //         'image'       => 'http://card.aa086.com/pictures/1.jpg'
        //     ]),
        // ];

    
        // $news = new News($items);
        // return $news;

    }




}
