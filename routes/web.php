<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    return view('home');
});
Route::get('/', [PostController::class, 'show_home'])->name('show_home');

// Protected Routes will be written here {Start}

Route::middleware(['auth'])->group(function (){
    Route::get('/report', function () {
        return view('report');
    });
    Route::get('dashboard', [PostController::class, 'showPost'])->name('dashboard');
    Route::get('/post',[PostController::class, 'index'])->name('post');
//    Route::get('adminLogin',[PostController::class, 'adminLogin'])->name('adminLogin');

});
//{End Middleware }


Route::get('show-auth-user', [ShowController::class, 'show_auth_user']);
Route::get('check_auth_user', [ShowController::class, 'check_auth_user']);
Route::post('/post',[PostController::class, 'store'])->name('post');
Route::get('edit_post/{id}', [PostController::class, 'edit_post'])->name('edit_post');
Route::get('delete_post/{id}', [PostController::class, 'delete_post'])->name('delete_post');
Route::post('edit_update/{id}', [PostController::class, 'edit_update'])->name('edit_update');

require __DIR__.'/auth.php';
