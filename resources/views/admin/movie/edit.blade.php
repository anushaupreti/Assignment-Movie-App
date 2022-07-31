@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
  <div class="py-15">
    <h1 class="text-6xl">
      Edit Movies Description
    </h1>
  </div>
</div>
{{-- 
@if ($errors->any())
 <div class="w-4/5 m-auto">
  <ul>
    @foreach ($errors->all() as $error)
        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl">
        {{$error}}</li>
    @endforeach
  </ul>
 </div>
    
@endif --}}
<div class="w-4/5 m-auto pt-20">
  <form action="/admin/movies/{{ $movies->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="Title..." class="bg-transparent border-b-2 w-full h-20 text-6xl outline-none" value="{{ $movies->title }}">

    <textarea name="description" id="" cols="30" rows="10" placeholder="Description..." class="py-20 bg-transparent  block border-b-2 w-full h-60 text-xl outline-none" >{{$movies->description}}</textarea>
    <label for="" class="bg-transparent text-2xl block border-b-2 rounded-sm">{{$movies->release_date}}</label><br>
      <input type="date" name="release_date" placeholder="Release Date" class="bg-transparent border-b-2 h-10 text-2xl outline-none ">
    <br><br>
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
      Update 
    </button>
  </form>
</div>


@endsection