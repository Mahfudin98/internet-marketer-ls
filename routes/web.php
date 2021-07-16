<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Anggota\IndexController;
use App\Http\Controllers\Anggota\LoginController;
use App\Http\Controllers\Anggota\SettingAnggotaController;
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
Route::get('/', [LoginController::class, 'loginForm'])->name('login.form');
Route::get('/list-agen-reseller', [IndexController::class, 'agenreseller'])->name('guest.index');
Route::post('/post/member/login', [LoginController::class, 'login'])->name('login.post');
Route::group(['middleware' => 'member'], function() {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('member.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('member.logout');

    Route::get('/user', [SettingAnggotaController::class, 'index'])->name('member.setting');
    Route::get('/stock', [IndexController::class, 'stock'])->name('member.stok');
    Route::get('/produk', [IndexController::class, 'product'])->name('member.produk');
    Route::post('/produk', [IndexController::class, 'productStore'])->name('member.product.store');
    // update stok
    Route::post('/produk-update', [IndexController::class, 'updateStock'])->name('member.update.stock');
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
        // product controller
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');
    });
});

require __DIR__.'/auth.php';
