<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PointCardController;
use App\Http\Controllers\PartnerController;

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
    return view('index');
});

Route::resource('store', StoreController::class);
Route::resource('partner', PartnerController::class)->only('index');
Route::resource('point_card', PointCardController::class);

// Route::get('/store/{id}', function ($id) {
//     echo $id;
// })->name('store.detail');
