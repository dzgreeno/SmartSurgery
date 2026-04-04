<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // رابط أخبار طبية حقيقية
        $rss_url = 'https://www.medicalnewstoday.com/rss';

        $news = [];

        $rss = @simplexml_load_file($rss_url);

        if ($rss && isset($rss->channel->item)) {
            foreach ($rss->channel->item as $item) {
                $news[] = [
                    'title' => (string)$item->title,
                    'link'  => (string)$item->link,
                ];
            }
        }

        return view('home', compact('news'));
    }
}
