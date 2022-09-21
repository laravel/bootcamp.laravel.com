<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::redirect('/installation', '/inertia/installation');
Route::redirect('/creating-chirps', '/inertia/creating-chirps');
Route::redirect('/showing-chirps', '/inertia/showing-chirps');
Route::redirect('/editing-chirps', '/inertia/editing-chirps');
Route::redirect('/deleting-chirps', '/inertia/deleting-chirps');
Route::redirect('/notifications-and-events', '/inertia/notifications-and-events');

Route::get('/{page?}', function (string $page = 'introduction') {
    if (View::exists($page)) {
        return view('docs', ['page' => $page]);
    }

    $fallback = preg_replace('/^(inertia|blade)\//', '', $page);
    abort_unless(View::exists($fallback), 404);

    return view('docs', ['page' => $fallback]);
})->where('page', '[a-z-\/]+');
