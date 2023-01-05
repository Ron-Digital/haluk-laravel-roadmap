<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Gate::authorize('is-my-post', $request);
        $posts = Post::create([
            "user_id"=>Auth::user()->id,
            "title"=>$request->title,
            "description"=>$request->description,
        ]);

        return response()->json([
            'message' => 'Succesful',
            'post' => new PostResource($posts)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        Gate::authorize('is-my-post', $post);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ]);
        }
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //$user_id=$request->user_id;
        $title=$request->title;
        $description=$request->description;

        Gate::authorize('is-my-post', $post);

        $post = $post->update([
            "user_id"=>Auth::user()->id,
            "title"=>$title,
            "description"=>$description,
        ]);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ]);
        }

        return response()->json([
            'message' => 'Succesful',
            'post' => new PostResource($post)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Gate::authorize('is-my-post', $post);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ]);
        }
        $post->delete();
    }
}
