<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post -> title = $request->title;
        $post -> description = $request->description;
        $post -> user_id = Auth::user()->id;
        $post -> team_id = Auth::user()->currentTeam->id;
        $post->save();

        $response['title'] = $request->title;
        $response['user']  = $post->user->name;
        $response['status']  = 'success';

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $response['post']=$post;
        $response['comments']=$post->comments;

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function apiShow()
    {
        $posts = Post::select('id','title','description')->where('user_id',Auth::user()->id)->get();

        return response()->json($posts);
    }

    public function loginRemote()
    {
        $client = new \GuzzleHttp\Client();
        $loginInput = [

        ];
        $url = '';
        $response = $client->request('POST', $url, ['form_params'=>$loginInput]);
        Auth::user()->tokenGis = $response->getBody()['accessToken'];
        dd(json_decode($response->getBody()));
    }
}
