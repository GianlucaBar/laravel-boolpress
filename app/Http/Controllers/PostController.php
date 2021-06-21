<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();

        $data =[
            'posts' => $posts
        ];
        
        return view('guests.posts.index', $data);
    }

    public function show($slug){

        $this_post = Post::where('slug','=',$slug)->first();

        if(!$this_post){
            abort('404');
        }
        
        $data = [
            'post' => $this_post
        ];

        return view('guests.posts.show', $data);
    }
}
