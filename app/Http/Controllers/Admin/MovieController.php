<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::get();
        return view('admin.dashboard', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();
        $request->image->move(public_path('movies'), $newImageName);
        Movie::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'release_date' => $request->input('release_date'),
            'image' => $newImageName,
        ]);
        return redirect('admin/dashboard')
            ->with('message', 'New Movie has been added Successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.movie.edit')
            ->with('movies', Movie::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Movie::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'release_date' => $request->input('release_date'),
            ]);
        return redirect('/admin/dashboard')
            ->with('message', 'Your Movie Details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movie::where('id', $id);
        $movies->delete();
        return redirect('/admin.dashboard')
            ->with('message', 'Movie has been deleted successfully!');
    }
}
