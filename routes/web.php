<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\LikeDislike;
use App\Models\LikesDislikes;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

// use App\Http\Controllers\Admin\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $likedislike = DB::table('likes_dislikes as ld')->join('movies as m', 'm.id', '=', 'ld.movie_id')->get();
    // dd($likedislike); 
    $movies = Movie::get();
    return view('welcome')->with(['movies' =>$movies, 'likedislike' => $likedislike]);
});
// Route::get('/', 'App\Http\Controllers\Admin\MovieController@home')->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //login route
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::resource('movies', MovieController::class);

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
    });
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});

// Route::post('addtofav', 'FavouriteController@store')->name('addtofavourite');
// Route::post('removefromfav', 'FavouriteController@remove')->name('removefromfav');

Route::get('like/{movie_id}', 'App\Http\Controllers\LikeDislike@like')->name('like');
Route::get('dislike', 'App\Http\Controllers\LikeDislike@dislike')->name('dislike');
// Route::get('admin/movies/index', 'App\Http\Controllers\Admin\MovieController@index')->name('index');
// Route::get('admin/movies/create', 'App\Http\Controllers\Admin\MovieController@create')->name('create');
