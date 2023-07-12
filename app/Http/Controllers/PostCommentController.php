<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function index(Post $post)
    {
        return $post->comments;
    }
    public function storeComment(Post $post, Request $request)
    {
        $h =   $post->comments()->create([
            'content' => $request->input('content'),
        ]);

        if ($h) {
            return back();
        }
    }
}
