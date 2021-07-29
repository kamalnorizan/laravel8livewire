<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','comments.user')->get();
        // $postsQb = DB::table('posts')->select(DB::raw('* , posts.description as decr'))
        //     ->join('comments','posts.id','comments.post_id')
        //     ->join('users','posts.user_id','users.id')
        //     ->where('post_id','86')
        //     ->get();

        $postsQb2 = DB::table('posts')->select(DB::raw('*, posts.description as content, comm.description as comment'))
            ->leftjoin('comments as comm','posts.id','comm.post_id')
            ->leftjoin('users','comm.user_id','users.id')
            ->where('post_id','86')
            ->get();

        // dd($postsQb2->where('comment','Ts')->first());
        return view('home');
    }
}

// Post
//  - User
//  - Comments
//               Post::with('user.images', 'comments.user.images')

        // DB::table('posts')->select(DB::Raw('*'))
        // ->join('users as postuser','posts.user_id','postuser.id')
        // ->join('comments','comments.post_id','posts.id')
        // ->join('users as commentuser','commentuser.user_id','users.id')
        // ->get();
// Comment
//  - User
//  - Post

// User
//  - Posts
//  - Comments
//  - Images

// Image
//  - User

//  Post -> User     Siapa yang tulis Post

//  Comment -> User  Suapa yang tulis comment
