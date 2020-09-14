<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Post;
class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function create()
    {
      return view('posts.create');
    }
    public function store()
    {
      $data = request()->validate([
          'title' => ['required'],
          'description' => ['required'],
          'price' => ['required'],
          'image' => ['required'],

      ]);

      $imagePath = request('image')->store('uploads', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
      $image->save();

      auth()->user()->posts()->create([
        'title' => $data['title'],
        'description' => $data['description'],
        'price' => $data['price'],
        'image' => $imagePath,

      ]);

      return redirect('/profile/'. auth()->user()->id);


    }

    public function show(Post $post)
    {
      return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
      $this->authorize('update', $post);
      return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
      $this->authorize('update', $post);
      $data = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => '',
      ]);

      if(request('image')){
        $imagePath = request('image')->store('profile', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
      }

      $post->update(array_merge(
        $data,
        ['image' => $imagePath]
      ));
      return redirect("/profile/{$post->user_id}");
    }
}
