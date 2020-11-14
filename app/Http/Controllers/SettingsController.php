<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

use Session;

class SettingsController extends Controller
{
    
    public function __costract(){
		
		$this->middleware('auth');
	}
	
	
	public function index(){
		
		return view('admin.settings.settings')->with('settings',Settings::first());
		
	}
	
	
	public function update(){
		
		 
        $this->validate(request(), [
			
            'site_name' => 'required',
			
            'address'  => 'required',
			
            'contact_number' => 'required',
			
            'contact_email' => 'required'
        ]);
		
	    $settings = Settings :: first();	
		
		$settings->site_name = request()->site_name;
		
		$settings->address = request()->address;
		
		$settings->contact_number = request()->contact_number;
		
		$settings->contact_email = request()->contact_email;
			
		$settings->save();
		
		Session::flash('success','settings updated');
		
		return redirect()->back();
		
	}
	
	
}
