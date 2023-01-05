<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\SiteDetailsController;
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
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('content.writer')->group(function () {
    Route::get('/site', [SiteDetailsController::class, 'index'])->name('site.content');
    Route::get('/site/create', [SiteDetailsController::class, 'create'])->name('site.content.create');
    Route::post('/site/create', [SiteDetailsController::class, 'store'])->name('site.content.store');
    Route::put('/site/{id}/edit', [SiteDetailsController::class, 'update'])->name('site.content.edit');

    // seed content
    Route::prefix('/seed-content')->group(function () {
        Route::get('/seeds', [SeedController::class, 'seedsForContentWriters'])->name('contentSeeds.all');
        Route::get('/seed/{id}', [SeedController::class, 'editDescription'])->name('contentSeeds.edit');
        Route::put('/seed/{id}/edit', [SeedController::class, 'provideDescription'])->name('contentSeeds.description');
    });
});


Route::middleware(['grand'])->group(function (){

    // company
   Route::resource('/company', CompanyController::class);
   Route::get('/company-archived', [CompanyController::class, 'archived'])->name('company.trashed');
   Route::post('/company/{id}/restore', [CompanyController::class, 'restore'])->name('company.restore');
   Route::get('/company-user', [CompanyController::class, 'createUser'])->name('company.user');
   Route::post('/company-user', [CompanyController::class, 'createUserCompany'])->name('company.user.create');

   //seed
    Route::resource('/seeds', SeedController::class);
    Route::get('/seeds-archived', [SeedController::class, 'archived'])->name('seeds.trashed');
    Route::post('/seeds/{id}/restore', [SeedController::class, 'restore'])->name('seeds.restore');
});

require __DIR__.'/auth.php';
