<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','content','category_id','featured','slug','user_id',
        'tag_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tags');
    }
    public function user(){
		
        return $this->belongsTo('App\User');
    }
}
