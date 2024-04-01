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

Route::get('/{page?}', function (string $page = 'introduction') {
    if (View::exists($page)) {
        return view('docs', ['page' => $page]);
    }

    $fallback = preg_replace('/^(presentation|blade|installations|javascript)\//', '', $page);

    abort_unless(View::exists($fallback), 404);

    return view('docs', ['page' => $fallback]);
})->where('page', '[a-z-\/]+')->middleware(['auth']);
