<?php

use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Home\AddCategory;
use App\Http\Livewire\Home\BlogHome;
use App\Http\Livewire\Home\BlogPost;
use App\Http\Livewire\Home\Contact;
use App\Http\Livewire\Home\CreateBlogs;
use App\Http\Livewire\Home\EditBlog;
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

Route::get('/', BlogHome::class)->name('home');

Route::get('/create', CreateBlogs::class)->name('create');

Route::get('/contact', Contact::class)->name('contact');

Route::get('/create/category', AddCategory::class)->name('create.category');

Route::get('/edit/{id}', EditBlog::class)->name('edit');

Route::get('/blog/{id}', BlogPost::class)->name('blog');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/blogs', function () {
    return view('admin.blogs');
})->name('admin.blogs');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/categories', function () {
    return view('admin.categories');
})->name('admin.categories');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/messages', function () {
    return view('admin.displayMsg');
})->name('admin.messages');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/contact', function () {
    return view('admin.contacts');
})->name('admin.contacts');