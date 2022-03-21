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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/teachers', [HomeController::class, 'teachers'])->name('home.teachers');
Route::get('/classes', [HomeController::class, 'classes'])->name('home.classes');
Route::get('/academic-calendar', [HomeController::class, 'academic-calendar'])->name('home.academic-calendar');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('home.testimonials');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('home.gallery');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('home.pricing');
Route::get('/events', [HomeController::class, 'events'])->name('home.events');
Route::get('/faq', [HomeController::class, 'faq'])->name('home.faq');
Route::get('/programs', [HomeController::class, 'programs'])->name('home.programs');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
