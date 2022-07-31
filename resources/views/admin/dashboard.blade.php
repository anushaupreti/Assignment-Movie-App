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
<a href="{{route('admin.movies.create')}}" class="btn btn-primary">ADD Movies</a>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-title">
                <h4> All Movies </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Movie Title</th>
                            <th>Description</th>
                            <th>Release Date</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1?>
                        @foreach($movies as $movie)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$movie->title}}</td>
                                <td>{{$movie->description}}</td>
                                <td>{{$movie->release_date}}</td>
                                <td><img src="/movies/{{$movie->image}}" height="100" width="100"></td>
                                <td>
                                    <a href="{{route('admin.movies.edit',$movie->id)}}" class="btn btn-success">
                                        <i class="fa fa-pencil" aria-hidden="true">Edit</i>
                                    </a>
                                    <a href="{{route('admin.movies.destroy',$movie
                                    ->id)}}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true">Delete</i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


