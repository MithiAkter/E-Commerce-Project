<?php


use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('home');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});



require __DIR__.'/auth.php';
