<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/work', function () {
    return view('work');
})->name('work');

Route::group(array('prefix' => 'admin'), function()
{
    // main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::get('/', function()
    {
        return View::make('admin.dashboard');
    })->name('admin');

    // subpage for the posts found at /admin/posts (app/views/admin/posts.blade.php)
    Route::get('posts', function()
    {
        return View::make('admin.posts');
    })->name('admin.posts');

    // subpage to create a post found at /admin/posts/create (app/views/admin/posts-create.blade.php)
    Route::get('posts/create', function()
    {
        return View::make('admin.posts.create');
    })->name('admin.posts.create');
});
