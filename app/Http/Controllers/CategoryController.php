<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view('guests.categories.index', $data);
    }

    public function show($slug){
        $this_category = Category::where('slug', '=', $slug)->first();

        if(!$this_category){
            abort('404');
        }
        
        $data = [
            'category' => $this_category,
            'posts' => $this_category->posts
        ];

        return view('guests.categories.show', $data);
    }
}
