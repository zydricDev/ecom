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
        <div class="col-4 pt-40 d-flex flex-column">
          <strong>Email: {{$post->user->email}}</strong>
          <strong>Title: {{$post->title}}</strong>
          <strong>Description: {{$post->description}}</strong>
          <strong>Price: ${{$post->price}}</strong>
        </div>

      </div>
    </div>
</x-app-layout>
