<?php

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

use App\Http\Controllers\HomeController;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home/index');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('home','HomeController');

Route::prefix('home')->group(function(){
    Route::get('/index', 'HomeController@index')->name('home/index');

    Route::get('/contact', 'HomeController@contact')->name('home/contact');
    Route::get('/about', 'HomeController@about')->name('home/about');

});



Route::prefix('ludotheque')->group(function (){
    Route::get('/index','ludothequeController@index')->name('ludotheque/index');
    Route::get('/mesJeux', 'ludothequeController@mesJeux')->name('ludotheque/mesJeux')->middleware('auth');
    Route::get('/show/{id}','ludothequeController@show')->name('ludotheque/show');
    Route::get('/edit/{id}','ludothequeController@edit')->name('ludotheque/edit')->middleware('auth');
    Route::get('/create','ludothequeController@create')->name('ludotheque/create')->middleware('auth');
    Route::get('/update/{id}','ludothequeController@update')->name('ludotheque/update')->middleware('auth');
    Route::post('/store','ludothequeController@store')->name('ludotheque/store')->middleware('auth');
    Route::delete('/destroy/{id}','ludothequeController@destroy')->name('ludotheque/destroy')->middleware('auth');

});


Route::prefix('commentaire')->middleware('auth')->group(function (){
    Route::get('/create/{jeu_id}', 'CommentaireController@create')->name('commentaire/create');
    Route::get('/index', 'CommentaireController@index')->name('commentaire/index');
    Route::post('/store', 'CommentaireController@store')->name('commentaire/store');
    Route::get('/update/{id}', 'CommentaireController@update')->name('commentaire/update');
    Route::get('/edit/{id}', 'CommentaireController@edit')->name('commentaire/edit');
    Route::delete('/destroy/{id}', 'CommentaireController@destroy')->name('commentaire/destroy');


});

Route::prefix('tag')->middleware('auth')->group(function (){
    Route::get('/create', 'TagController@create')->name('tag/create');
    Route::get('/index', 'TagController@index')->name('tag/index');
    Route::post('/store', 'TagController@store')->name('tag/store');
    Route::post('/newLabel', 'TagController@newLabel')->name('tag/newLabel');

});

