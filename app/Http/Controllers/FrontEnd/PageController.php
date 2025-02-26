<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Hero,Page};
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function show($slug) {
        $content = Page::where('slug', $slug)->firstOrFail();
        $banner = Hero::where('page_id', $content->id)->first();
        return view('template.' . $content->template, compact('content', 'banner'));
    }
}
