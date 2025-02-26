<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Page;

class IndexController extends Controller
{

    public function index()
    {
        $sliders = Hero::where('type', 'slider')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $banner = Hero::where('type', 'banner')
            ->where('status', 1)
            ->where('page_id', 1)
            ->first();

        $content = Page::where('title', 'home')->where('slug', 'home')->first();

        return view('web.welcome',
            compact(
                'sliders',
                'banner',
                'content'
            ));
    }
}
