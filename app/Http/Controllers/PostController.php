<?php

namespace App\Http\Controllers;
use Session;
use App\Post;
use App\Category;
use App\Tags;
use File;
use Auth;

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
        return view('admin.post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categories = Category::all();
            
            $tags = Tags::all();
    
            if($categories->count() == 0 || $tags->count()==0)
            {
                Session::flash('info', 'You must have some categories and tags before attempting to create a post');
    
                return redirect()->back();
            }
    
            return view('admin.post.create')
            ->with('tags', $tags)
            ->with('categories', $categories);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
             'tag_id' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
			
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'slug' => str_slug($request->title),
			'user_id'=>Auth::id()
        ]);

        Session::flash('success','Post created successfully');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
		
		return view('admin.post.edit')->with('post',$post)->with('categories',Category::all());
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
        $this->validate($request, [
            'title' => 'required',
			
            'content' => 'required',
			
            'category_id' => 'required'
        ]);
		
		$post = Post::find($id);
		
		if($request->hasFile('featured')){
			
			 $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);
		
		$post->featured = 'uploads/posts/'.$featured_new_name;	
				
			
		}
		
		 $post->title = $request->title;
		
         $post->content = $request->content;
		
         $post->category_id = $request->category_id;
		
		$post->save();
		
		Session::flash('success','Post updated Succesfully');
		
		return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $imagePath = $post->featured;
		
		if(file_exists($imagePath)){
			
			 File::delete($imagePath);
        }
        $post->delete();

        Session::flash('success','Post deleted Succesfully');
		
		return redirect()->route('posts');
    }
}
