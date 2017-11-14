<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
	public function store(Request $request)
    {

        $post = Post::where('uid', $request->post)->first();
    	$like = [
    		'user_id'=>auth()->user()->id,
    	];

    	$data = new Like($like);
        $insert = $post->like()->save($data);

        $response = [
        	'status' 		=> '1',
        	'like_count' 	=> $insert->post->like_count,
        	'like_id' 		=> $insert->id,
        ];
        return \Response::json($response);
    }

    public function destroy($uid, $id)
    {
    	$like = Like::find($id)->delete();
    	$post = Post::where('uid', $uid)->first();
        $response = [
        	'status' 		=> '1',
        	'like_count' 	=> $post->like_count,
        ];
        return \Response::json($response);
    }
}
