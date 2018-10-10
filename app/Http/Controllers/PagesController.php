<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::latest()->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function postContact(){
        return view('pages.contact');
    }
}
