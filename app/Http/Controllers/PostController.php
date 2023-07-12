<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function page()
    {
        return view('pages.Blog');
    }
    public function index()
    {
        return Post::all()->take(10);
    }

    public function single(Post $post)
    {
        return view('pages.post', [
            'post' => $post,
        ]);
    }
}
