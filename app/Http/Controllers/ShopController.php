<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
          'sell_image' => '',
        ]);

        auth()->user()->saveContent()->create([
          'seller_id' => $data['seller_id'],
          'sell_name' => $data['sell_name'],
          'sell_price' => $data['sell_price'],
          'sell_image' => $data['sell_image'],
        ]);

        return redirect('/profile/'.$request->seller_id);
    }

    public function index()
    {
        return view('cart.items');
    }

    public function edit(Shop $info)
    {

      $this->authorize('update', $info);
      $anUpdate = $this->update($info);
      if($anUpdate == 0){
        return redirect('/cart?Not_enough_funds');
      }
      return redirect('/cart');
    }

    public function update(Shop $info)
    {

      $this->authorize('update', $info);
      $currentBalance = auth()->user()->balance;
      if($currentBalance >= $info->sell_price){
        $subtractedBalance = $currentBalance - $info->sell_price;
        Shop::where('id',$info->id)->update(['confirmed' => '1']);
        User::where('id',$info->user_id)->update(['balance' => $subtractedBalance]);
        return 1;
      }

      return 0;
    }

}
