<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['grand'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('content.writer')->group(function () {
    Route::get('/site', [\App\Http\Controllers\SiteDetailsController::class, 'index'])->name('site.content');
    Route::get('/site/create', [\App\Http\Controllers\SiteDetailsController::class, 'create'])->name('site.content.create');
    Route::post('/site/create', [\App\Http\Controllers\SiteDetailsController::class, 'store'])->name('site.content.store');
    Route::put('/site/{id}/edit', [\App\Http\Controllers\SiteDetailsController::class, 'update'])->name('site.content.edit');
});


Route::middleware(['grand'])->group(function (){
   Route::resource('/company', \App\Http\Controllers\CompanyController::class);
   Route::get('/company-archived', [\App\Http\Controllers\CompanyController::class, 'archived'])->name('company.trashed');
   Route::post('/company/{id}/restore', [\App\Http\Controllers\CompanyController::class, 'restore'])->name('company.restore');
   Route::get('/company-user', [\App\Http\Controllers\CompanyController::class, 'createUser'])->name('company.user');
   Route::post('/company-user', [\App\Http\Controllers\CompanyController::class, 'createUserCompany'])->name('company.user.create');
});

require __DIR__.'/auth.php';
