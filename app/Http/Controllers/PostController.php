<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function writePost()
    {
        return view('post.write_post');
    }
}
