<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug'   
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
