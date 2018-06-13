<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function index()
    {
      // sans scope, récupère tous les posts
      // $posts = Post::get();
      // avec scope, récupère que les posts online
      // $posts = Post::published()->get();
      $posts = Post::with('category')->published()->searchByTitle('article')->get();
      // dd($posts);
      return view('posts.index', compact('posts'));
    }

    public function edit($id)
    {
      $post = Post::findOrFail($id);
      $categories = Category::pluck('name', 'id');
      // dd($categories);
      return view('posts.edit', compact('post', 'categories'));
    }

    public function show($id)
    {
      $post = Post::published()->where('id', $id)->firstOrFail();
      return $post;
    }

    public function update($id, Request $request)
    {
      $post = Post::findOrFail($id);
      $validator = Validator::make($request->all(),[
                      'tilte' => 'required|min:5',
                      'content' => 'required|min:10'
                    ]);
      if($validator->fails()){
        return redirect(route('news.edit', $id))->withErrors($validator->errors());
      } else {
        $post->update($request->all());
        // $post->tags()->sync($request->get('tags'));
        // dd($request->all());
        return redirect(route('news.edit', $id));
      }
    }

    public function create()
    {
      $post = new Post;
      $categories = Category::pluck('name', 'id');
      return view('posts.create', compact('post', 'categories'));
    }

    public function store(Request $request)
    {
      $post = Post::create($request->all());
      // return redirect(route('welcome'));
      // return redirect(route('news.edit', $post));
    }
}
