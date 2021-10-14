<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VideoByCategoryController;
use App\Http\Controllers\VideoSearch;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/categoryShow', [CategoryController::class, 'cardShow'])->name('categoryCardShow');

Route::get('/signIn', function () {
    if (session()->has('token')) {
        return redirect('/');
    } else {
        return view('signIn');
    }
})->name('signIn');

Route::get('/signOut', function () {
    if (session()->has('token')) {
        session()->pull('token');
        session()->pull('profileID');
        session()->pull('firstName');
        session()->pull('lastName');
        session()->pull('is_admin');
        session()->pull('image');
        session()->put('activeMenu', 'home');
    }
    return redirect('/signIn');
})->name('signOut');

Route::get('/signUp', function () {
    return view('register');
})->name('signUp');

Route::post('user', [UserAuth::class, 'userLogin']);

Route::resource('category', CategoryController::class);

Route::resource('video', VideoController::class);

Route::resource('file', FilesController::class);

Route::resource('history', HistoryController::class);

Route::resource('profile', ProfileController::class);

Route::delete('/fileOut/{fileID}', [FilesController::class, 'deleteFile']);

Route::get('/downLoadFile/{fileID}', [DownloadController::class, 'downloadFile'])->name('downloadFile');

Route::get('/videoByCategory/{categoryID}', [VideoByCategoryController::class, 'index'])->name('videoByCategory');

Route::get('/videoSearch', [VideoSearch::class, 'index'])->name('videoSearch');

Route::get('/videoSearchKey', [VideoSearch::class, 'search'])->name('videoSearchKeyword');

Route::get('/englishPlayBoxGames/{unit?}/{subUnit?}', [IndexController::class, 'GamesShow'])->name('englishPlayBoxGames');

Route::get('/stream/{v}', [IndexController::class, 'streamVideo'])->name('stream');
