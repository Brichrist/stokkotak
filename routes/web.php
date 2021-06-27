<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockBoxController;

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


route::resource('/stockkotak', StockBoxController::class);
// route::post('/stockkotak/store', [StockBoxController::class,'store']);
// route::post('/stockkotak/update/{id}', [StockBoxController::class,'update']);

route::get('/stockkotak/change/{ukuran}', [StockBoxController::class,'indexukuran']);
route::get('/stockkotak/change/{ukuran}/{tinggi}', [StockBoxController::class,'indextinggi']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';












Route::get('/home', function () {
    return view('home');
});
