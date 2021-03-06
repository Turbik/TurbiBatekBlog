<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
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
        //Utwórz zmienną i przechowuj wszystkie wpisy bloga w bazie danych
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        //Zwróć widok i przekaż do powyższej zmiennej
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'       =>       'required|max:255',
            'slug'        =>       'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' =>       'required|integer',
            'body'        =>       'required'
            
        ));
        
        
        $post = new Post;
        
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        
        
        $post->save();
        
        Session::flash('success', 'Wpis został pomyślnie zapisany!');
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //znajdz wpis w bazie danych i zapisz jako zmienna
        $post = Post::find($id);      
        // zwróc widok i przenies do zmienniej którą utworzylismy wczesniej
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats);
        
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
        
        $post = Post::find($id);
        
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));
        } else {
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));
        }
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->save();
        
        Session::flash('success', 'Wpis zostasł pomyślnie zapisany.');
        
        return redirect()->route('posts.show', $post->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();
        
        Session::flash('success', 'Wpis został pomyślnie usunięty.');
        return redirect()->route('posts.index');
    }
}
