<?php

use App\Http\Controllers\HomeController;
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


//Front user Routes

Route::get('/', [HomeController::class , 'index'])->name('home');


Route::get('/posts/{post:slug}', [\App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}', [\App\Http\Controllers\PostsController::class, 'addComment'])->name('posts.add_comment');


Route::get('/about', \App\Http\Controllers\AboutController::class  )->name('about');
Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author');

Route::get('/contact',[\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/contact',[\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/categories/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name("categories.show");
Route::get('/categories/', [\App\Http\Controllers\CategoryController::class, 'index'])->name("categories.index");

Route::get('/tags/{tag:name}', [\App\Http\Controllers\TagController::class, 'show'])->name("tags.show");


require __DIR__.'/auth.php';

// Admin Dashboard Routes

Route::prefix('admin')->name('admin.')->middleware(['auth' , 'check_permissions'])->group(function (){

    Route::get('/',[\App\Http\Controllers\AdminControllers\DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [\App\Http\Controllers\AdminControllers\TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');


    Route::resource('posts', \App\Http\Controllers\AdminControllers\PostsController::class);
    Route::resource('categories', \App\Http\Controllers\AdminControllers\CategoriesController::class);
    Route::resource('comments', \App\Http\Controllers\AdminControllers\CommentsController::class);


    Route::resource('tags',\App\Http\Controllers\AdminControllers\TagsController::class)->only(['index','show','destroy']);

    Route::resource('roles', \App\Http\Controllers\AdminControllers\RolesController::class);
    Route::resource('users', \App\Http\Controllers\AdminControllers\UsersController::class);
    Route::get('contacts', [\App\Http\Controllers\AdminControllers\ContactsController::class,'index'])->name('contacts.index');
    Route::delete('contacts/{contact}', [\App\Http\Controllers\AdminControllers\ContactsController::class,'destroy'])->name('contacts.destroy');

    Route::get('about', [\App\Http\Controllers\AdminControllers\SettingController::class,'edit'])->name('setting.edit');
    Route::post('about', [\App\Http\Controllers\AdminControllers\SettingController::class,'update'])->name('setting.update');
});


