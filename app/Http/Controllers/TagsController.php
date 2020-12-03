<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use App\Category;
use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags',Tags::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
			
			'tag'=>'required'
		]);
		
		
        Tags::create([
			
			'tag'=>$request->tag
		]);
		
		Session::flash('success','Tag created successfully.');
		
		return redirect()->route('tags');
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
        $tag=Tags::find($id);
		
		
		return view('admin.tags.edit')->with('tag',$tag);
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
			
			'tag'=>'required'
		]);
		
		$tag=Tags::find($id);
		
		$tag->tag =$request->tag;
		
		$tag->save();
		
		Session::flash('success','Tag updated successfully.');
		
		return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tags::destroy($id);
		
			Session::flash('success','Tag Delete successfully.');
		
		return redirect()->back();
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
