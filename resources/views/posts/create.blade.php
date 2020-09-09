<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>

    </x-slot>

    <div class="container">
      <div class="row p-5">
          <div>
            <x-jet-label value="Item Description" />
            <x-jet-input class="block w-full" type="text" name="post_item" :value="old('post_item')" required autofocus autocomplete="post_item" />
          </div>
          <div>
            <x-jet-label value="Item Price" />
            <x-jet-input class="block" type="text" name="post_price" :value="old('post_price')" required autofocus autocomplete="post_price" />
          </div>
          <div class="row pt-5">
            <x-jet-label value="Post Image" />
            <x-jet-input class="form-control-file" type="file" name="image" />
          </div>
          <div class="row pt-5">
            <x-jet-label value="Add This Item" />
            <x-jet-button class="p-5"/>
          </div>
      </div>
    </div>
</x-app-layout>
