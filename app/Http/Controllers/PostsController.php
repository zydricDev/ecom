<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

      auth()->user()->posts()->create([
        'title' => $data['title'],
        'description' => $data['description'],
        'price' => $data['price'],
        'image' => $imagePath,

      ]);

      return redirect('/profile/'. auth()->user()->id);


    }
}
