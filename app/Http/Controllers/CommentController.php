<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();

        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|max:250'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ]);
        }

        $post = Post::withTrashed()->where('id', $request->post_id)->first();

        if ($post->deleted_at == null) {
            $comments = Comment::create([
                "user_id"=>Auth::user()->id,
                "post_id"=>$request->post_id,
                "comment"=>$request->comment,
            ]);

            return response()->json([
                'message' => 'Succesful',
                'Comment' => new CommentResource($comments)
            ]);
        }

        return response()->json([
            'message' => 'Post not found',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        if (!$comment) {
            return response()->json([
                'message' => 'Comment not found'
            ]);
        }
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $user_id=$request->user_id;
        $post_id=$request->post_id;
        $comment=$request->comment;

        $comment = $comment->update([
            "user_id"=>$user_id,
            "post_id"=>$post_id,
            "comment"=>$comment,
        ]);

        if (!$comment) {
            return response()->json([
                'message' => 'Comment not found'
            ]);
        }

        return response()->json([
            'message' => 'Succesful',
            'post' => new CommentResource($comment)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (!$comment) {
            return response()->json([
                'message' => 'Comment not found'
            ]);
        }
        $comment->delete();
    }
}
