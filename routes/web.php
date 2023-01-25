<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reports\AdminCompaniesReports as AdminCompaniesReportsAlias;
use App\Http\Controllers\Reports\AdminUserReports as AdminUserReportsAlias;
use App\Http\Controllers\Reports\CustomerInvoices as CustomerInvoicesAlias;
use App\Http\Controllers\Reports\CustomerInvoicesDetails as CustomerInvoicesDetailsAlias;
use App\Http\Controllers\SalesController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-details', [ProfileController::class, 'updateDetails'])->name('profile.updateDetails');
    Route::post('/profile-details-add', [ProfileController::class, 'storeUserDetails'])->name('profile.storeDetails');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/invoices', CustomerInvoicesAlias::class)->name('reports.invoices');
    Route::get('/invoices/{id}', CustomerInvoicesDetailsAlias::class)->name('reports.invoicesData');
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
   //seed
    Route::resource('/seeds', SeedController::class);
    Route::get('/seeds-archived', [SeedController::class, 'archived'])->name('seeds.trashed');
    Route::post('/seeds/{id}/restore', [SeedController::class, 'restore'])->name('seeds.restore');
});


Route::middleware('admin')->group(function () {

    Route::prefix('/reports')->group(function () {
        Route::get('/usersPayments', AdminUserReportsAlias::class)->name('reports.adminUser');
        Route::get('/companiesPayments', AdminCompaniesReportsAlias::class)->name('reports.adminCompany');
        Route::get('/usersPayments/export-csv', [CSVController::class, 'adminCustomersReport'])
            ->name('csv.adminCustomers');
        Route::get('/companiesPayments/export-csv', [CSVController::class, 'adminCompaniesReport'])
            ->name('csv.adminCompanies');
        Route::get('company-payment/{id}', [PaymentController::class, 'companyAgreement'])->name('reports.adminCompanyShow');
    });

    Route::resource('/employees', EmployeesController::class);

});


Route::middleware('manager')->group(function () {

    Route::get('company-payments', [PaymentController::class, 'companyPayments'])->name('companyPayment.index');
    Route::get('company-payment', [PaymentController::class, 'companyPayment'])->name('companyPayment.create');
    Route::post('company-payment-add', [PaymentController::class, 'companyPaymentStore'])->name('companyPayment.store');
    Route::get('company-payment/{id}', [PaymentController::class, 'companyAgreement'])->name('companyPayment.show');
    Route::resource('/sales', SalesController::class);

});

require __DIR__.'/auth.php';
