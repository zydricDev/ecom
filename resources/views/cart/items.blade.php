<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Shopping Cart
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
                <form class="mt-3" action="/cart/{{ $info->id }}/delete" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="submit" class="btn btn-primary" value="Delete">
                </form>
              </div>
              @endcan

              <img class="w-25 pl-5 mb-5" src="{{$info->sell_image}}">

              <div class="d-flex flex-column p-3">
                <p class="p-2">Seller Id#: {{$info->seller_id}}</p>
                <p class="p-2">Item Name: {{$info->sell_name}}</p>
                <p class="p-2">Item(ea.) Price : ${{$info->sell_price}}</p>
                <p class="p-2">Quantity: x{{$info->sell_quantity}}</p>
                <p class="p-2">Added: {{$info->created_at}}</p>
                <strong class="p-2">Total Price: $<span id="total.{{$info->seller_id}}.{{$info->created_at}}"></span></strong>
                <script>
                  var total = {{$info->sell_price}} * {{$info->sell_quantity}};
                  document.getElementById("total.{{$info->seller_id}}.{{$info->created_at}}").innerHTML = total;
                </script>
              </div>
            </div>
          @endforeach
        </div>


      </div>






    </div>
</x-app-layout>
