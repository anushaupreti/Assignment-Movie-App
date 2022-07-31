<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    
  <div class="flex flex-col">
      @if(Route::has('login'))
          <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
              @auth('admin')
              <a href="{{ route('admin.dashboard')}}">Admin Dashboard</a>
              @else
              <a href="{{route('admin.login')}}" 
              class="mo-underline hover:underline text-small font-normal text-teal-800 uppercase"
              >Admin Login</a>
              @endauth
              @auth
                  <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
              @else
                  <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('user Login') }}</a>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                  @endif
              @endauth
          </div>
      @endif
  </div>

@foreach ($movies as $movie )
  <div class="bg-blue-100 sm:grid grid-cols-2 gap-20 w-4/5 mx-auto my-auto py-10 border-b border-gray-200 mt-20">
    <div>
      <img src="/movies/{{$movie->image}}" width="300" alt="this is blog-img">
      {{-- <img src="/movies/{{$movie->image}}" height="100" width="100"> --}}
    </div>
    <div>
      <h2 class="text-gray-700 font-bold text-5xl pb-4 mt-0">
        {{$movie->title}}
      {{-- Black Rose --}}
      </h2>
      <span class="text-gray-500">
        {{-- By <span class="font-bold italic text-gray-800">{{Auth::guard('admin')->user()->name}}</span>, Created on: --}}
      </span>
      <div class="text-gray-600 font-bold italic mt-2">{{$movie->release_date}}</div>
      <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
          {{$movie->description}}    </p>
      <span>
        @foreach($likedislike as $ld)
        @if($ld->movie_id==$movie->id)
        <a href="{{route('like',['movie_id'=>$movie->id])}}"><i class="far fa-heart 2xl" aria-hidden="true"></i></a>
        @else
        <a href=""{{route('dislike')}}><i class="fa fa-heart" aria-hidden="true"></i></a>
        @endif
        @endforeach 
        <span>Total Likes:{{$movies->like_count}}</span>
        &nbsp;&nbsp;
          <i class="far fa-bookmark fa-2x"></i>&nbsp;&nbsp;
      </span>
    
      <a href="" class="uppercase bg-blue-500 text-gray-100 text-large text-extrabold py-4 px-8 rounded-3xl">
        See More
      </a>

      {{-- @if (isset(Auth::user()->id)&& Auth::user()->id == $post->user_id) --}}
      {{-- <span class="float-right">
        
        <span class="float-right">
          <form action="" method="POST">
          @csrf
          @method('delete')
          <button class="text-red-500 pr-3" type="submit"></button>
        </form>

        </span>
      </span> --}}
          
      {{-- @endif --}}
    </div>
  </div>
@endforeach
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  {{-- <script>
    $(function(){
      console.log('hello');
    });
  </script> --}}
</body>
</html>
