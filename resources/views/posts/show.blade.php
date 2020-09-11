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
           <input type="hidden" id="seller_id" name="seller_id" value="{{$post->user->id}}">
          <strong>Title: {{$post->title}}</strong>
          <input type="hidden" id="sell_name" name="sell_name" value="{{$post->title}}">
          <strong>Description: {{$post->description}}</strong>
          <strong>Price: ${{$post->price}}</strong>
          <input type="hidden" id="sell_price" name="sell_price" value="{{$post->price}}">
          <button type="submit" class="btn btn-primary">Add to cart</button>
        </form>


      </div>
    </div>
</x-app-layout>
