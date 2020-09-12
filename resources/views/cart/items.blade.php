<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>

    </x-slot>

    <div class="container">
      <div class="pt-5">
        @foreach($content as $info)
          <div class="p-5">
            @can('update', $info)
            <div>
              <a href="/cart/{{ $info->id }}/edit">Checkout</a>
            </div>
            @endcan
            <p>{{$info->id}}</p>
            <p>{{$info->user_id}}</p>
            <p>{{$info->sell_price}}</p>
            <p>{{$info->sell_name}}</p>
          </div>

        @endforeach

      </div>


    </div>
</x-app-layout>
