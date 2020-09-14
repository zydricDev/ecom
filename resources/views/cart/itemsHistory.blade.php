<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          History
        </h2>

    </x-slot>

    <div class="container">
      <div class="d-flex flex-row">


        <div class="pt-5">
          @foreach($deliveredList as $list)
            <div class="row">
              <div class="d-flex p-3">
                <p class="p-2">Item Delivered: </p>
              </div>

              <img class="w-25 pl-5 mb-5" src="{{$list->sell_image}}">
              <div class="d-flex flex-column p-3">
                <p class="p-2">Seller Id#: {{$list->seller_id}}</p>
                <p class="p-2">Item Name: {{$list->sell_name}}</p>
                <p class="p-2">Buyer Id#: {{$list->user_id}}</p>
                <p class="p-2">Item Price: ${{$list->sell_price}}</p>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pt-5">
          @foreach($recievedList as $list)
            <div class="row">
              <div class="d-flex p-3">
                <p class="p-2">Item Recieved: </p>
              </div>

              <img class="w-25 pl-5 mb-5" src="{{$list->sell_image}}">
              <div class="d-flex flex-column p-3">
                <p class="p-2">Seller Id#: {{$list->seller_id}}</p>
                <p class="p-2">Item Name: {{$list->sell_name}}</p>
                <p class="p-2">Buyer Id#: {{$list->user_id}}</p>
                <p class="p-2">Item Price: ${{$list->sell_price}}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>






    </div>
</x-app-layout>
