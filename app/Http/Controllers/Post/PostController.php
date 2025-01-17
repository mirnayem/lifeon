<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
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
        $allposts = Post::paginate(10);

        return view('posts.index',compact('allposts'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $previous_id = Post::where('id','<',$post->id)->max('id');
        $next_id = Post::where('id','>',$post->id)->min('id');
    
        $next = Post::find($next_id);
        $previous = Post::find($previous_id);

        return view('posts.show', compact('post','next','previous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function archive()
    {
        $archive_posts = Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();

        $archives = Post::selectRaw("year(created_at) year, monthname(created_at)  month ")->groupBy("year", "month")->orderByRaw("min(created_at) desc")->get()->toArray();

        return view('posts.archive',compact('archives','archive_posts'));
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required | min:3',
        ]);

        $search = $request->input('search');

        $search_posts = Post::where('title', 'like', "%$search%")->orWhereHas('categories', function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->orWhereHas('tags', function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->orWhereHas('user', function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search . '%');
        })->get();


        return view('posts.search',compact('search_posts'));
    }
}
