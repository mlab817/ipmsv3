<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/python','PythonController@run');

Route::get('/slack', function() {
  $message = 'Go to hell';

  \Log::debug('Go to hell');
});

Route::get('/download', function() {
    $user = \Illuminate\Support\Facades\Auth::user();
    $ou = $user->operating_unit;
    $pa = $ou->prexc_activities;

//    return response()->json($pa);
    return new \App\Exports\ProgramsExport($pa);
});

Route::get('/programs', function() {
    // $user = \Illuminate\Support\Facades\Auth::user();
    $user = \App\User::find(4);
    $ou = $user->operating_unit;
    $pa = $ou->prexc_activities;

   // return response()->json($pa);
    return view('exports.programs')->with('prexc_activities', $pa);
});
