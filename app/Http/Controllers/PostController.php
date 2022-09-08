<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $posts = auth()->user()->posts()
            ->orderby($request->get('sort', 'publication_date'), $request->get('direction', 'desc'))
            ->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->fill($request->validated())->setAttribute('user_id', auth()->user()->id)->save();
        return redirect()->route('posts.index')
            ->with('success','Post Has Been updated successfully');
    }
}
