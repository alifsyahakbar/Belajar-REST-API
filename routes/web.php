<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/health/live', function () {
    return 'ok';
});

Route::get('/health/ready', function () {
    $check = DB::connection()->getDatabaseName();
    if ($check > 0) {
        return 'ok';
    }
    return response('no', 500);
});
