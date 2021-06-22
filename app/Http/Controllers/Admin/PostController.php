<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

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
        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // validazione 
        $request->validate($this->validation());

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

        $new_post_data['slug'] = $new_slug;

        $new_post = new Post();

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
            'post' => $this_post,
            'post_category' => $this_post->category
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
        $this_post = Post::findOrFail($id);
        $categories = Category::all();

        $data = [
            'post' => $this_post,
            'categories' => $categories
        ];

        return view('admin.posts.edit', $data);
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
        // validazione
        $request->validate($this->validation());

        $mod_post_data = $request->all();

        $mod_post = Post::findOrFail($id);

        if($mod_post_data['title'] != $mod_post->title){
            // creo il nuovo slug 
            $new_slug = Str::Slug($mod_post_data['title'], '-');
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

            $mod_post_data['slug'] = $new_slug;
        }

        $mod_post->update($mod_post_data);

        $mod_post->save();

        return redirect()->route('admin.posts.show', ['post' => $mod_post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this_post = Post::find($id);

        $this_post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function validation(){
        {
            return 
                [
                    'title' => 'required|max:100',
                    'content' => 'required',
                    'category_id' => 'nullable|exists:categories,id'
                ];
        }
    }
}
