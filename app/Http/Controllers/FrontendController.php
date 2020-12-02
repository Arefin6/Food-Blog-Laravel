<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Settings;

use App\Category;

use App\Post;

use App\Tag;

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


    }
    public function category($id){
    
    }
}
