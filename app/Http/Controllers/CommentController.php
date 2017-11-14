<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    	$post = Post::where('uid', $request->post)->first();
    	$comment = [
    		'user_id'=>auth()->user()->id,
    		'comment'=>$request->comment
    	];
    	$data = new Comment($comment);
        $insert = $post->comment()->save($data);

        $response = [
        	'status' 			=> (($insert)?'1':'0'),
        	'comment_count' 	=> $insert->post->comment_count,
            'name'				=> auth()->user()->username,
        ];
        return \Response::json($response);
    }
}
