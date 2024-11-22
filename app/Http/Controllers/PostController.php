<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Date;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $local= Post::where('type','=','local')->paginate(3);
       $sport= Post::where('type','=','sport')->paginate(4);
       $international= Post::where('type','=','international')->paginate(3);
       //make an operation to find the resent three posts
       $date=Date::yesterday();
       $resent= Post::whereDate('created_at','>',$date)->paginate(3);
        return response()->view('pages.first',[
            'local'=>$local,
            'international'=>$international,
            'sport'=>$sport,
            'resent'=>$resent,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
