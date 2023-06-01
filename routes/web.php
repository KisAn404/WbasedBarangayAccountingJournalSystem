<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\REAIController;
use App\Http\Controllers\RAAFController;
use App\Http\Controllers\TransmittalController;
use App\Http\Controllers\SCKIController;
use App\Http\Controllers\CashbookController;
use App\Http\Controllers\generatepdfController;
use App\Http\Controllers\FilterReportController;
use App\Http\Controllers\FIlterREAIController;
use App\Http\Controllers\FilterTLController;
use App\Http\Controllers\FilterCBController;
use App\Http\Controllers\FilterSCKIController;
use App\Http\Controllers\FilterRAAFController;
use App\Http\Controllers\SearchController;


use App\Models\bank_account;
use App\Transaction;

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
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::group(['middleware' => ['auth', 'admin']], function () {
 Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

 Route::resource('collection',CollectionController::class);
Route::get('/admin/collection', [CollectionController::class, 'index'])->name('admin.collection.index')->middleware('auth');
Route::resource('collection',CollectionController::class);
// Route::get('/admin/collection/{id}/edit', 'CollectionController@edit')->name('collection.edit');
Route::delete('/transactions/{collection}', 'TransactionController@destroy')->name('transactions.destroy');
Route::resource('deposit',DepositController::class);
Route::get('/admin/deposit', [DepositController::class, 'index'])->name('admin.deposit.index')->middleware('auth');
Route::get('/admin/deposit/{id}/edit', 'DepositController@edit')->name('admin.deposit.edit');
Route::delete('/transactions/{deposit}', 'TransactionController@destroy')->name('transactions.destroy');
Route::resource('expense',ExpensesController::class);
Route::get('/admin/expense', [ExpensesController::class, 'index'])->name('admin.expense.index')->middleware('auth');
Route::get('/admin/expenses/{id}/edit', 'ExpenseController@edit')->name('admin.expense.edit');
Route::resource('withdraw',WithdrawController::class);
Route::get('/admin/withdraw', [WithdrawController::class, 'index'])->name('admin.withdraw.index')->middleware('auth');
Route::get('/admin/withdraw/{id}/edit', 'WithdrawController@edit')->name('admin.withdraw.edit');
Route::delete('/transactions/{withdraw}', 'TransactionController@destroy')->name('transactions.destroy');


Route::get('RCD', [RCDController::class, 'index'])->name('RCD');
Route::resource('account', AccountController::class);
Route::get('/admin/account', [AccountController::class, 'index'])->name('admin.account.index')->middleware('auth');
Route::resource('accform',AccFormController::class);
Route::get('/admin/accform', [AccFormController::class, 'index'])->name('admin.accform.index')->middleware('auth');
Route::POST('/admin/accform', [AccFormController::class, 'store'])->name('accform.store')->middleware('auth');
Route::delete('/admin/accform/{id}/edit', 'AccFormController@edit')->name('admin.accform.edit');


Route::get('/admin/bank', 'BankController@index')->name('admin.bank.index');
Route::get('/admin/bank/create', [BankController::class, 'create'])->name('admin.bank.create');
Route::post('/bank/store', 'BankController@store')->name('bank.store');
Route::get('/admin/bank/{id}/edit', 'BankController@edit')->name('admin.bank.edit');
Route::put('/bank/{bank}', 'BankController@update')->name('bank.update');


Route::get('fund', [FundController::class, 'index'])->name('fund.index')->middleware('auth');
Route::get('/fund/create', [FundController::class, 'create'])->name('fund.create')->middleware('auth');
Route::post('/fund/store', [FundController::class, 'store'])->name('fund.store')->middleware('auth');
Route::get('/fund/{fund}', [FundController::class, 'show'])->name('fund.show')->middleware('auth');
Route::get('/fund/{fund}/edit', [FundController::class, 'edit'])->name('fund.edit')->middleware('auth');
Route::put('/fund/{fund}', [FundController::class, 'update'])->name('fund.update')->middleware('auth');
Route::delete('/fund/{fund}', [FundController::class, 'destroy'])->name('fund.destroy')->middleware('auth');
Route::match(['get', 'post'], '/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
Route::resource('filter',FilterReportController::class);
Route::resource('reai',FIlterREAIController::class);
Route::resource('cb',FilterCBController::class);
Route::resource('tl',FilterTLController::class);
Route::resource('scki',FilterSCKIController::class);
Route::resource('raaf',FilterRAAFController::class);
Route::resource('bank',BankController::class);
Route::get('RCD', [RCDController::class, 'index'])->name('RCD');
Route::get('REAI', [REAIController::class, 'index'])->name('REAI');
Route::get('RAAF', [RAAFController::class, 'index'])->name('RAAF');
Route::get('TL', [TransmittalController::class, 'index'])->name('TL');
Route::get('SCKI', [SCKIController::class, 'index'])->name('SCKI');
Route::get('CB', [CashbookController::class, 'index'])->name('CB');
Route::get('pdfreport', [generatepdfController::class, 'index'])->name('pdfreport');

Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);
Route::get('/search', [SearchController::class, 'search'])->name('search');


});
   

Route::group(['middleware' => ['auth', 'barangay officials']], function () {
Route::get('/barangay officials/dashboard', [DashboardController::class, 'officialDashboard'])->name('barangay officials.dashboard');
});

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('pdf', [PdfController::class, 'index'])->name('pdf');
//Route::get('/pdf', [CollectionController::class, 'index'])->name('pdf.index')->middleware('auth');
//Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
//Route::get('/recent-activity', function () {
//})->name('recent-activity');


