<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(7);
        return view('posts', ['posts' => $posts]);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('single-post', ['post' => $post]);
    }
}
