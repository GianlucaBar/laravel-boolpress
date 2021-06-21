<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_post_data = $request->all();

        // creo il nuovo slug 
        $new_slug = Str::Slug($new_post_data['title'], '-');
        $base_slug = $new_slug;

        // preparo il ciclo inizializzando la condizione e il contatore 
        $same_slug_found = Post::where('slug', '=', $new_slug)->first();
        $counter = 1;

        // ricerca slug identici ed eventuale modifica 
        while($same_slug_found){
            // aggiungo numero counter allo slug trovato 
            $new_slug = $base_slug . '-' . $counter;

            $counter++;

            // verifico che quest'ultima modifica abbia generato uno slug univoco 
            $same_slug_found = Post::where('slug', '=', $new_slug)->first();
            // se trova anche ques'ultimo rientra nel ciclo 
        }

        $new_post = new Post();

        $new_post->slug = $new_slug;
        $new_post->fill($new_post_data);

        $new_post->save();

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this_post = Post::findOrFail($id);

        $data = [
            'post' => $this_post
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
