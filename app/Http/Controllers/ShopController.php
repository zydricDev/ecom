<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function store(Request $request){
        if($request->seller_id == auth()->user()->id){
          return redirect('/profile/'.auth()->user()->id.'?Cannot_buy_your_own_items');
        }
        $data = $this->validate($request,[
          'seller_id' => 'required',
          'sell_name' => 'required',
          'sell_price' => 'required',
        ]);

        auth()->user()->saveContent()->create([
          'seller_id' => $data['seller_id'],
          'sell_name' => $data['sell_name'],
          'sell_price' => $data['sell_price'],
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function index()
    {
        $content = Shop::where('user_id', auth()->user()->id)->get();
        return view('cart.index',compact('content'));
    }
}
