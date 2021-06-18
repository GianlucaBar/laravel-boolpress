<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        return view('guests.home');
    }

    public function postlist(){

        $posts = Post::all();

        $data =[
            'posts' => $posts
        ];

        return view('guests.postlist', $data);
    }

    public function showpost(){

        $this_post = Post::findOrFail($id);
        
        $data = [
            'post' => $this_post
        ];

        return view('guest.showpost', $data);
    }

}
