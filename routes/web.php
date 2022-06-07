<?php

use App\Http\Controllers\VehiclesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/* Routes for Vehicle Database.
    * Store - // POST new database entry.
    * Edit - // GET mySQL row data for modal.
    * Update - // POST updated mySQL data.
    * FetchAll - // GET all vehicles for datatable.
*/
Route::controller(VehiclesController::class)->group(
    function () {
        Route::get('/', 'index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/fetch-all', 'fetchAll')->name('fetchAll');
    }
);
