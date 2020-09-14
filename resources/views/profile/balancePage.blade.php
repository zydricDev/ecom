<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Balance
        </h2>

    </x-slot>

    <div class="container">

      <form class="row" action="/balance/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="col-5">
          <label for="BalanceList">Add Funds: </label>

          <select class="col-5 mt-10 ml-3 p-2 bg-primary text-white" name="addFunds" id="addFunds">
            <option value="5">$5</option>
            <option value="10">$10</option>
            <option value="20">$20</option>
            <option value="50">$50</option>
            <option value="100">$100</option>
            <option value="1000">$1000</option>
            <option value="10000">$10,000</option>
            <option value="100000">$100,000</option>
            <option value="1000000">$1,000,000</option>
          </select>

        </div>
        <div class="col-10 mt-10">
          <button type="submit" class="mt-5 btn btn-primary">Add Funds</button>
        </div>


      </form>





    </div>
</x-app-layout>
