<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\PostResource;
use App\Models\Item;
use App\Models\Post;

class ItemSearchController extends Controller
{
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function index(Request $request)
    {
        if($request->has('titlesearch')){
            $items = Item::search($request->titlesearch)->paginate(6);
            print_r(json_encode(Item::search('')->paginate(6)));
        }else{
            $items = Item::paginate(6);
        }
        return view('item-search', compact('items'));
    }

    public function index2(Request $request)
    {
        //Set params defaults
        $search = $request->searchParam ? $request->searchParam : 'tag';
        $sortBy = $request->sortBy ? $request->sortBy : 'created_at';
        $sortDesc = $request->sortDesc ? 'desc' : 'asc';

        $posts = Post::where($search,'LIKE',"%".  $request->search . "%")->orderBy($sortBy,$sortDesc)->paginate($request->limit);

        return response()->json([
            'meta' => $this->meta($posts),
            'post' => PostResource::collection($posts)
        ]);
    }
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function create(Request $request)
    {
        $item = new Item();
        $item -> title = $request -> title;
        $item -> save();

        //Item::create($request->title);


        return redirect()->action([ItemSearchController::class, 'index']);
    }
}
