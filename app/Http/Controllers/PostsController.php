<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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

    public function destroy(Post $post)
    {
        $delete_query = Post::where('id',$post->id)->where('user_id',$post->user_id)->delete();
        $imagePath = $post->image;
        if($imagePath){
          unlink(storage_path('app/public/'.$imagePath));
        }
        return redirect("/profile/{$post->user_id}");
    }

    public function index(Post $post)
    {
        return view('posts.browse', compact('post'));
    }

    function action(Request $request)
    {

     if($request->ajax())
     {
        $output = '';
        $query = $request->get('query');
        if($query != ''){

         $data = POST::where('title', 'like', '%'.$query.'%')
           ->orWhere('description', 'like', '%'.$query.'%')
           ->orWhere('user_id', 'like', '%'.$query.'%')->get();

        }else{
         $data = POST::orderBy('created_at', 'desc')->limit(10)->get();
        }

        $total_row = $data->count();

        if($total_row > 0){
         foreach($data as $row){
          $output .= '

          <tr>

             <td><a href="/p/'.$row->id.'"><img src="/storage/'.$row->image.'" class="w-20"></a></td>
             <td><a href="/p/'.$row->id.'">'.$row->title.'</a></td>
             <td>$'.$row->price.'</td>
             <td>'.$row->user_id.'</td>
          </tr>
          ';
          }
        }else{
         $output = '
         <tr>
          <td align="center" colspan="5">No results</td>
         </tr>
         ';
        }

        $data = array(
         'searched_items'  => $output,
         'summed_row'  => $total_row
        );

        echo json_encode($data);
       }
    }
}
