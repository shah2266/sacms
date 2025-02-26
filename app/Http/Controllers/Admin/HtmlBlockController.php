<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HtmlBlockController extends Controller
{
    public function index() {
        return view('html-block.index');
    }
    public function about() {
        return view('html-block.about');
    }

    public function product() {
        return view('html-block.product');
    }

    public function service() {
        return view('html-block.service');
    }

    public function card() {
        return view('html-block.card');
    }

    public function paragraph() {
        return view('html-block.paragraph');
    }

    public function others() {
        return view('html-block.others');
    }
}
