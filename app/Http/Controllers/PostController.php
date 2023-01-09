<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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

        Log::warning('User is accessing all the Posts', ['user' => Auth::user()->id]);

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
        Log::warning('User is trying to create a post', ['user' => Auth::user()->id, 'data' => $request->except('password')]);

        //Gate::authorize('is-my-post', $request);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id;

        if ($post->save()) {
            Log::info('User create a single post successfully', ['user' => Auth::user()->id, 'post' => $post->id]);
            return response()->json([
                'message' => 'Succesful',
                'post' => new PostResource($post)
            ]);
        }
        Log::warning('Post could not be created caused by invalid post data', ['user' => Auth::user()->id, 'data' => $request->except('password')]);
        return; // 422
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

        Log::info('User is accessing a single post', ['user' => Auth::user()->id, 'post' => $post->id]);

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
        $title = $request->title;
        $description = $request->description;

        Gate::authorize('is-my-post', $post);

        $post = $post->update([
            "user_id" => Auth::user()->id,
            "title" => $title,
            "description" => $description,
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

        Log::warning('User is trying to delete a single post', ['user' => Auth::user()->id, 'post' => $post]);

        if ($post) {
            Log::info('User deleted a single post successfully', ['user' => Auth::user()->id, 'post' => $post]);

            $post->delete();

            return response()->json([
                'message' => 'Post deleted'
            ]);
        }

        Log::error('Post not found by user for deleting', ['user' => Auth::user()->id, 'post' => $post]);
        return; // 404
    }
}

// 'daily' => [
//     'driver' => 'daily',
//     'path' => storage_path('logs/laravel.log'),
//     'level' => env('LOG_LEVEL', 'debug'),
//     'days' => 14,
//     'formatter' => MonologFormatterHtmlFormatter::class,
//     'formatter_with' => [
//       'dateFormat' => 'Y-m-d',
//     ]
//   ],

// config/logging.php
