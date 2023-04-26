<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\AccFormController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RCDController;
use App\Http\Controllers\ActivityLogController;



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

Route::get('/', function(){
    return redirect('/login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'index'])->middleware('auth'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::resource('account', AccountController::class);
Route::get('/account', [AccountController::class, 'index'])->name('account.index')->middleware('auth');

Route::resource('accform',AccFormController::class);
Route::get('/accform', [AccFormController::class, 'index'])->name('accform.index')->middleware('auth');

Route::get('/fund', [FundController::class, 'index'])->name('fund.index')->middleware('auth');
Route::get('/fund/create', [FundController::class, 'create'])->name('fund.create')->middleware('auth');
Route::post('/fund/store', [FundController::class, 'store'])->name('fund.store')->middleware('auth');
Route::get('/fund/{fund}', [FundController::class, 'show'])->name('fund.show')->middleware('auth');
Route::get('/fund/{fund}/edit', [FundController::class, 'edit'])->name('fund.edit')->middleware('auth');
Route::put('/fund/{fund}', [FundController::class, 'update'])->name('fund.update')->middleware('auth');
Route::delete('/fund/{fund}', [FundController::class, 'destroy'])->name('fund.destroy')->middleware('auth');
Route::get('/funds', [FundController::class, 'index'])->name('funds.index');

Route::resource('deposit',DepositController::class);
Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.index')->middleware('auth');

Route::resource('expense',ExpensesController::class);
Route::get('/expense', [ExpensesController::class, 'index'])->name('expense.index')->middleware('auth');

Route::resource('collection',CollectionController::class);
Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index')->middleware('auth');

Route::resource('withdraw',WithdrawController::class);
Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw.index')->middleware('auth');

Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports.index');


Route::get('pdf', [PdfController::class, 'index'])->name('pdf');
Route::get('/pdf', [CollectionController::class, 'index'])->name('pdf.index')->middleware('auth');


Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
Route::get('/recent-activity', function () {
})->name('recent-activity');



Route::post('/dashboard', 'DashboardController@index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/dashboard', function(){
return redirect('/admin/dashboard');})->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::match(['GET', 'POST'], '/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('RCD', [RCDController::class, 'index'])->name('RCD');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

