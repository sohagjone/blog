<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tags = tag::all();
       $categories = category::all();
       return view('admin.post.post', compact('tags', 'categories'));
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
            'title'  => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'body' => 'required'
           ]);
           if($request->hasFile('image'))
           {
                $imageName = $request->image->store('public');
           }
         
        
        $post =  new post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->body = $request->body;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('tags', 'categories')->where('id', $id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
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
            'title'  => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'image'=> 'required',
            'body' => 'required'
           ]);

           if($request->hasFile('image'))
           {
                $imageName = $request->image->store('public');
           }
         
           $post =  post::find($id);
           $post->image = $imageName;
           $post->title = $request->title;
           $post->subtitle = $request->subtitle;
           $post->slug = $request->slug;
           $post->status = $request->status;
           $post->body = $request->body;
           $post->save();
           $post->tags()->sync($request->tags);
           $post->categories()->sync($request->tags);
           

           return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
        return redirect()->back();
    }
}
