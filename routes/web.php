<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/run', 'API\PythonController@run');

Route::get('/python','PythonController@run');

Route::get('/upload', function() {
	return view('upload');
});

Route::post('/upload', function(Request $request) {
	// endorsements folder = 1Lra5JH6NwC56luUOlYVv5X9kUgg92Hy6
	// $uploadedFile = Storage::disk('google')->put('1Lra5JH6NwC56luUOlYVv5X9kUgg92Hy6', $request->file('file'));
	// storeAs uses folder_id, file_name, driver
	// $uploadedFile = $request->file('file')->storeAs('1Lra5JH6NwC56luUOlYVv5X9kUgg92Hy6','endorsement','google');
	// will create a streamable link
	$now = \Carbon\Carbon::now();
	$timestamp = \Carbon\Carbon::parse($now)->timestamp;

	$uploadedFile = Storage::disk('google')->putFileAs('1Lra5JH6NwC56luUOlYVv5X9kUgg92Hy6', $request->file('file'), 'endorsement_'. $timestamp); // this return can be used

	// logos = 1PjMcAGFMoN5CLAP_YzAW5xKWa5CiyKav
	// dd($uploadedFile); // returns path
	return Storage::disk('google')->url($uploadedFile);
});

Route::get('/projects/{id}', function($id) {
	$project = App\Models\Project::find($id);

	$versions = $project->versions;

	return response()->json($versions);
})->where('id', '[0-9]+');