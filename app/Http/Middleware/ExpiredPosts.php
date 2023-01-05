<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;

class ExpiredPosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $post = Post::query()
        // ->where('user_id', Auth::user()->id)
        // ->where('created_at', '>', Carbon::now()->subDay(10))
        // ->get();

        // if ($post) {
        //     return $next($request);
        // }

        // return response()->json([
        //     'message' => 'There is no post with in 10 days'
        // ]);
        $post= Post::where('active', '1')->first();

        if($post){
            return $next($request);
        }
        if(!$post){
            return response()->json([
                'message' => 'Post not found'
            ]);
        }
    }
}
