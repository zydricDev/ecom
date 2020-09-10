<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome back {{ $user->name }}!
        </h2>

    </x-slot>

    <div class="container">
      <div class="row">
        <div class="col-3 p-5">
          <img src="{{ $user->profile_photo_url }}" class="rounded-circle" style="height: 13em; width: 13em;">
        </div>
        <div class="col-9 pt-5">
          <div class="d-flex flex-column">
            <div class="pr-3"><strong>Email: {{ $user->email }}</strong></div>

            <div class="d-flex flex-column pt-4">
              <div class="pr-3"><strong>Title: {{ $user->profile->title }}</strong></div>
              <div class="pr-3"><strong>About Me: {{ $user->profile->description }}</strong></div>
              <div class="pr-3"><strong>Net: {{ $user->profile->price }}</strong></div>
              <div class="pr-3"><strong>Listed: {{ $user->posts->count() }} item(s)</strong></div>
            </div>

          </div>
        </div>


      </div>
      <div class="row pt-5 pb-5">
        @foreach($user->posts as $post)
            <div class="col-4">
              @can ('update', $post)
              <div class="d-flex justify-content-center">
                <a href="/test/{{ $post->id }}/edit" class=""><strong>Edit</strong></a>
              </div>
              @endcan
              <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100 d-flex flex-column">
              </a>
              <div class="d-flex flex-column pt-4">

                <label for="/storage/{{ $post->image }}">Title: {{ $post->title }}</label>
                <label for="/storage/{{ $post->image }}">Desc: {{ $post->description }}</label>
                <label for="/storage/{{ $post->image }}">Price: ${{ $post->price }}</label>
                <label for="/storage/{{ $post->image }}">Date: ${{ $post->created_at->toDateString() }}</label>
                <label for="/storage/{{ $post->image }}">Time Added: {{ $post->created_at->toTimeString() }}</label>
              </div>

            </div>
        @endforeach
      </div>
    </div>
</x-app-layout>
