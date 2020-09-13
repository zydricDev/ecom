<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Item(s) Need To Deliver
        </h2>

    </x-slot>

    <div class="container">
      <div class="pt-5">
        @foreach($pendingList as $list)
          <div class="row">
            @can('update', $list)
            <div class="p-3">
              <a class="btn btn-primary" href="/deliver/{{ $list->id }}/edit">Item Delivered</a>
            </div>
            @endcan

            <img class="w-25 pl-5 mb-5" src="{{$list->sell_image}}">
            <div class="d-flex flex-column p-3">
              <p class="p-2">Buyer Id#: {{$list->user_id}}</p>
              <p class="p-2">Item Name: {{$list->sell_name}}</p>
              <p class="p-2">Item Price: ${{$list->sell_price}}</p>
            </div>
          </div>
        @endforeach
      </div>






    </div>
</x-app-layout>
