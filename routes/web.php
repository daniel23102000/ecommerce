<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardStoreController;



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
    return view('home', [
        "title" => "Home",
        'active' => "home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        'active' => "home",
        "name" => "Daniel Raul Rurubua",
        "email" => "danielraul4625@gmail.com",
        "image" => "daniel.png"
    ]);
});

Route::get('/example', [PostController::class, 'index']);

// Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/store/{author:username}', [PostController::class, 'index']);

// Route::get('/store/{post:username}', [PostController::class, 'index']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/store', DashboardStoreController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');