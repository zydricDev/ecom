<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>

    </x-slot>

    <div class="container">
      <p>Hoppin</p>
      @foreach($content as $info)
        <p>{{$info->user_id}}</p>
        <p>{{$info->sell_price}}</p>
        <p>{{$info->sell_name}}</p>
      @endforeach
    </div>
</x-app-layout>
