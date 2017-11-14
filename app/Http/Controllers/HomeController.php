<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = auth()->user();
        $follow     = $user->following->pluck('follow_id')->toArray();
        $posts      = Post::with('user', 'comment.user')
                            ->whereIn('user_id', $follow)
                            ->orWhere('user_id', $user->id)
                            ->orderBy('created_at')
                            ->get();
                            
        return view('welcome', compact(['posts']));
    }
}
