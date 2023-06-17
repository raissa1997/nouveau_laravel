<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Route::resource("posts", PostController::class);
    //Route::resource('posts',[PostController::class,'dashboard'])->name('dashboard');
 //Route::post('posts',[PostController::class,'dashboard'])->name('dashboard');
Route::get('create',[PostController::class,'create'])->name('create');
Route::post('posts/store',[PostController::class,'store'])->name('store');
Route::get('/show/{id}',[PostController::class,'show'])->name('show');
Route::get('list',[PostController::class,'list'])->name('list'); 
Route::get('delete/{id}',[PostController::class,'delete_post'])->name('delete');
Route::get('update_post/{id}',[PostController::class,'update_post'])->name('update_post');
//Route::get('edit/{id}',[PostController::class,'edit'])->name('edit/{id}');
Route::get('edit/{id}',[PostController::class,'edit{$id}'])->name('edit/{id}'); 
Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('admin/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin-dashboard');
});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('admin/dashboard', function () {
//         return view('admin_dashboard');
//     })->name('admin-dashboard');
// });


// La route-ressource => Les routes "post.*"
//Route::resource("posts", PostController::class);
// Route::post('add',[PostController::class,'add_post'])->name('add');
 //Route::get('delete/{id}',[PostController::class,'delete_post'])->name('delete');
// Route::get('update/{id}',[PostController::class,'update_post'])->name('update');
// //Route::post('update/{id}',[PostController::class,'update_post'])->name('update_post');
//Route::post('show/{id}',[PostController::class,'show_post']);


