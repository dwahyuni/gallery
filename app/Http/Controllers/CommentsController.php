<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postComment(Request $request, Post $post) 
    {
        $comment = New Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return back()->withMessage('Komentar Terkirim!');
    }
}