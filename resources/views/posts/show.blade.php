<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $post->title }}
        </h2>

    </x-slot>

    <div class="container">
      <div class="row">
        <div class="col-5">
          <img src="/storage/{{$post->image}}" class="w-100 pt-5">
        </div>
        <form class="col-4 pt-40 d-flex flex-column" action="/shop" method="post">
          @csrf
          <strong>Email: {{$post->user->email}}</strong>
          <strong>Title: {{$post->title}}</strong>
          <strong>Description: {{$post->description}}</strong>
          <strong>Price: ${{$post->price}}</strong>

          <input type="hidden" id="seller_id" name="seller_id" value="{{$post->user->id}}">
          <input type="hidden" id="sell_name" name="sell_name" value="{{$post->title}}">
          <input type="hidden" id="sell_price" name="sell_price" value="{{$post->price}}">
          <input type="hidden" id="sell_image" name="sell_image" value="/storage/{{$post->image}}">
          <label for="sell_quantity">Quantity: x<input type="number" id="sell_quantity" name="sell_quantity" value='1' class="bg-primary text-white w-12"></label>

          <button type="submit" class="btn btn-primary mt-4">Add to cart</button>
        </form>


      </div>
    </div>
</x-app-layout>
