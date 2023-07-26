<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
// use App\Http\Controllers\PointCardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SnorkelingController;
use App\Http\Controllers\FreeDivingController;
use App\Http\Controllers\ScubaController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ShopController;

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

// Route::get('/', function () {

//     $marker = [
//         ["location" => "花瓶岩", "lat" => 22.35541851, "lng" => 120.38165],
//         ["location" => "中澳", "lat" => 22.35122843, "lng" => 120.3875026],
//         ["location" => "電廠", "lat" => 22.33871866, "lng" => 120.3778391],
//         ["location" => "厚石", "lat" => 22.32456304, "lng" => 120.3653352],
//         ["location" => "海子口", "lat" => 22.32539109, "lng" => 120.3591294],
//         ["location" => "多仔坪", "lat" => 22.35014315, "lng" => 120.3654971],
//         ["location" => "龍蝦洞", "lat" => 22.34506537, "lng" => 120.3884634],
//         ["location" => "衫福", "lat" => 22.34224709, "lng" => 120.3629457]
//     ];

//     // $marker = Marker::all()->toArray();

//     return view('index', compact("marker"));
// });
Route::resource('/', IndexController::class)->only('index');
Route::get('map/{id}', [IndexController::class, 'show'])->name('map.show');
Route::resource('store', StoreController::class);
Route::resource('hotel', HotelController::class);
Route::resource('shop', ShopController::class);
Route::resource('partner', PartnerController::class)->only('index');
// Route::resource('point_card', PointCardController::class);
Route::resource('snorkeling', SnorkelingController::class)->only('index');
Route::resource('freeDiving', FreeDivingController::class)->only('index');
Route::resource('scuba', ScubaController::class)->only('index');

Route::get('/search_markers', [IndexController::class, 'search_markers'])->name('markers.search');

// Route::get('/store/{id}', function ($id) {
//     echo $id;
// })->location('store.detail');
