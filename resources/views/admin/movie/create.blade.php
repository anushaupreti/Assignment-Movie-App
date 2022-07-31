<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  You're logged in!
              </div>
          </div>
      </div>
  </div>
</x-admin-layout>
  <div class="w-4/5 m-auto text-left">
    <div class="py-15">
      <h1 class="text-6xl">
        Create Post
      </h1>
    </div>
  </div>

  <div class="w-4/5 m-auto pt-20">
    <form action="/movies/store" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" name="title" placeholder="Title..." class="bg-transparent border-b-2 w-full h-20 text-6xl outline-none">

      <textarea name="description" id="" cols="30" rows="10" placeholder="Description..." class="py-20 bg-transparent  block border-b-2 w-full h-60 text-xl outline-none"></textarea>

      <input type="date" name="release_date" placeholder="Release Date" class="bg-transparent border-b-2 h-10 text-2xl outline-none ">
      <div class="bg-gray-lighter pt-15">
        <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer rounded-3xl">
          <span class="mt-2 text-base leading-normal">
              Select a file
          </span>
          <input type="file"
          name="image"
          class="hidden">
        </label>
      </div>

      <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        Submit
      </button>
    </form>
  </div>


