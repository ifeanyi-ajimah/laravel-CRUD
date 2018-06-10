<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('active',1)->orderBy('id','desc')->take(10)->get();
        return view('layout.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'body'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,max:10000',
            
            ]);
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request ->image->move('images',$imageName);
            $formInput = new Post;
            $formInput->title = $request->title;
            $formInput->description = $request->description;
            $formInput->body = $request->body;
            $formInput->image = $imageName;
            $formInput->active = $request->active;
            $formInput->save();
            session()->flash('notify', 'Post created');

            return redirect()->route('post.index');



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('layout.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::where('active', 1)->find($id);
        return view('layout.update', compact('posts'));
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
         $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'body'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,max:10000',
            
            ]);
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request ->image->move('images',$imageName);
            $formInput =  Post::find($id);
            $formInput->title = $request->title;
            $formInput->description = $request->description;
            $formInput->body = $request->body;
            $formInput->image = $imageName;
            $formInput->active = $request->active;
            $formInput->update();
            session()->flash('notify', 'Post Successfully Updated');

            return redirect()->route('post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back();
    }
}
