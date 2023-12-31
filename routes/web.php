<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

//Query log inside storage\logs\laravel.log
/* use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
DB::listen(function($sql) {
    Log::info($sql->sql);
    Log::info($sql->bindings);
    Log::info($sql->time);
}); */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return Activity::all();
    return view('frontend.index');
});
Route::get('/activity', function() {
    return Activity::all();
});
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/index', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Employee Management
    Route::resource('employee', EmployeeController::class);

    //Paypal Payment
    Route::post('/pay', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('success', [PaymentController::class, 'success']);
    Route::get('error', [PaymentController::class, 'error']);

    //Eloquent Model
    Route::get('/student', [StudentController::class, 'index']);
});

require __DIR__.'/auth.php';
