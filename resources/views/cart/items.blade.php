<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>

    </x-slot>

    <div class="container">
      <div class="d-flex flex-row">
        <div class="pt-5">
          @foreach($content as $info)
            <div class="row">
              @can('update', $info)
              <div class="p-3">
                <a class="btn btn-primary" href="/cart/{{ $info->id }}/edit">Check out</a>

              </div>
              @endcan

              <img class="w-25 pl-5 mb-5" src="{{$info->sell_image}}">

              <div class="d-flex flex-column p-3">
                <p class="p-2">Seller Id#: {{$info->seller_id}}</p>
                <p class="p-2">Item Name: {{$info->sell_name}}</p>
                <p class="p-2">Buyer Id#: {{$info->user_id}}</p>
                <p class="p-2">Item Price: ${{$info->sell_price}}</p>

              </div>
            </div>
          @endforeach
        </div>

        <div class="pt-5">
          @foreach($content2 as $info2)
            <div class="row">


              <div class="d-flex p-3">
                <p class="p-2">Item Pending: </p>
              </div>

              <img class="w-25 pl-5 mb-5" src="{{$info2->sell_image}}">
              <div class="d-flex flex-column p-3">
                <p class="p-2">Seller Id#: {{$info2->seller_id}}</p>
                <p class="p-2">Item Name: {{$info2->sell_name}}</p>
                <p class="p-2">Buyer Id#: {{$info2->user_id}}</p>
                <p class="p-2">Item Price: ${{$info2->sell_price}}</p>

              </div>
            </div>
          @endforeach
        </div>
      </div>






    </div>
</x-app-layout>
