<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Post;

use App\Tags;

use App\Category;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard')
            ->with('posts_count',Post::all()->count())
			
			  ->with('tags_count',Tags::all()->count())
			
			  ->with('users_count',User::all()->count())
			
			  ->with('categories_count',category::all()->count());
    }

    public function users(){
        return view('admin.User.index')->with('users',User::all());
    }

    public function userDelete($id){
        User::destroy($id);
		
        Session::flash('success','User Delete successfully.');
    
    return redirect()->back();
    }
}
