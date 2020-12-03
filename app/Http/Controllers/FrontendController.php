<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Settings;

use App\Category;

use App\Post;

use App\Tags;

class FrontendController extends Controller
{
    public function index(){
		
		return view('welcome')
			
			->with('title',Settings::first()->site_name)
			
			->with('categories',Category::take(4)->get())
		
			->with('first_post',Post::orderBy('created_at','desc')->first())
			
			->with('secend_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->first())
			
			->with('thired_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->first())
			
			->with('wordpress',Category::find(1))
				   
			->with('laravel',Category::find(2))
			
			->with('ruby',Category::find(3))
			
			->with('settings',Settings::first());
    }
    
    public function singlepost($slug){
           
        $post = Post::where('slug',$slug)->first();
		
		$next_id = Post::where('id','>',$post->id)->min('id');
		
		$prev_id = Post::where('id','<',$post->id)->max('id');
		
		return view('single')->with('post',$post)
			
		                     ->with('title',$post->title)
			                  
			                  ->with('settings',Settings::first())
			
			                  ->with('tags',Tags::all())
			
			                 ->with('categories',Category::take(4)->get())
			
			                 ->with('next',Post::find($next_id))
			
			                 ->with('prev',Post::find($prev_id));

    }
    public function category($id){
        $category = Category::find($id);
		
		return view('category')
			
			->with('category', $category)
			
			 ->with('title',$category->name)
			                  
			 ->with('settings',Settings::first())
			
			->with('categories',Category::take(4)->get());
    }

    public function tag($id){

        $tag = Tags::find($id);
		
		return view('tags')
			
			->with('tags', $tag)
			
			 ->with('title',$tag->tag)
			                  
             ->with('settings',Settings::first())

             ->with('categories',Category::take(4)->get());
					 
    }
}
