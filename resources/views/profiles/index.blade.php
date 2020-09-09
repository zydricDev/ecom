<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome back {{ $user->name }}!
        </h2>

    </x-slot>

    <div class="container">
      <div class="row">
        <div class="col-4 p-5">
          <p>{{ $user->profile->title }}</p>
          <p>{{ $user->profile->description }}</p>
          <p>{{ $user->profile->price }}</p>
          <p>things</p>
        </div>
      </div>
    </div>
</x-app-layout>
