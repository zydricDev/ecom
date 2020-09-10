<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>

    </x-slot>

    <div class="container">
      <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row pt-4">
            <div class="col-5">
              <x-jet-label value="Item title" />
              <x-jet-input class="block w-full" type="text" name="title" id="title" :value="old('title')" required autofocus autocomplete="title" />

              <x-jet-label value="Item Description" />
              <x-jet-input class="block w-full" type="text" name="description" id="title" :value="old('description')" required autofocus autocomplete="description" />

              <x-jet-label value="Item Price" />
              <x-jet-input class="block" type="number" min="0" max="1000000" name="price" id="price" :value="old('price')" required />

            </div>

            <div class="col-5">
              <x-jet-label value="Post Image" />
              <x-jet-input class="form-control-file" type="file" name="image" required />
            </div>

        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" name="button" class="btn btn-primary">Post Item</button>
        </div>
      </form>
    </div>
</x-app-layout>
