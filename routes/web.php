<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Anggota\IndexController;
use App\Http\Controllers\Anggota\LoginController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

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

// Route::get('/index', [IndexController::class, 'index'])->name('member.index');
Route::get('/', [IndexController::class, 'index'])->name('guest.index');
Route::get('/member/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/post/member/login', [LoginController::class, 'login'])->name('login.post');
Route::group(['middleware' => 'member'], function() {
    Route::get('/list', [IndexController::class, 'list'])->name('member.video');
    Route::get('logout', [LoginController::class, 'logout'])->name('member.logout'); //TAMBAHKAN BARIS INI
});
Route::group(['middleware' => ['auth']], function (){
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/anggota', AnggotaController::class);
        // category controller
        Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/kategori', [CategoryController::class, 'store'])->name('category.post');
        Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::put('/kategori/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
        // video Controller
        Route::get('/video', [VideoController::class, 'index'])->name('video.index');
        Route::post('/video', [VideoController::class, 'store'])->name('video.post');
        Route::put('/video/edit/{id}', [VideoController::class, 'update'])->name('video.update');
        Route::delete('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');
        // user controller
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    });
});

require __DIR__.'/auth.php';
