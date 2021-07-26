<?php
use Laravel\Ui;
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
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/')->group(function(){
    Route::get('/', [App\Http\Controllers\Blog\PortfolioController::class, 'index'])->name('index');
    Route::get('portfolio', [App\Http\Controllers\Blog\PortfolioController::class, 'index'])->name('portfolio');
    Route::get('post/{post_slug}', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('post');
    Route::get('person', [App\Http\Controllers\Blog\PersonController::class, 'index'])->name('person');
    Route::get('contact-me', [App\Http\Controllers\Blog\FeedbackController::class, 'index'])->name('feedback');
    Route::post('contact-me', [App\Http\Controllers\Blog\FeedbackController::class, 'sending'])->name('feedback.send');
});

Auth::routes();




Route::prefix('home')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('category', 'Admin\BlogCategoryController');
    Route::put('category/{id}/restore', 'Admin\BlogCategoryController@restore')->name('category.restore');
    Route::resource('post', 'Admin\BlogPostController');
    Route::put('post/{id}/restore', 'Admin\BlogPostController@restore')->name('post.restore');
    Route::resource('contact', 'Admin\ContactController');
    Route::put('contact/{id}/restore', 'Admin\ContactController@restore')->name('contact.restore');

});

