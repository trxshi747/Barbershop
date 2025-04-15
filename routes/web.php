<?php

use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Admin\ForfaitController;
use App\Http\Controllers\Admin\RDVPController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\Barber\CalendarController;
use App\Http\Controllers\BarberMainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerMainController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::controller(AdminMainController::class)->group(function (){
            Route::get('/dashboard','index')->name('admin');
            Route::get('/order/history','order_history')->name('admin.order.history');
            Route::get('/settings/settings','settings')->name('admin.settings.settings');
        });
        Route::controller(BarberController::class)->group(function (){
            Route::get('/barber/create','index')->name('barber.create');
            Route::get('/barber/manage','manage')->name('barber.manage');
        });
        Route::controller(ServiceController::class)->group(function (){
            Route::get('/service/create','index')->name('service.create');
            Route::get('/service/manage','manage')->name('service.manage');
        });
        Route::controller(ForfaitController::class)->group(function (){
            Route::get('/forfait/create','index')->name('forfait.create');
            Route::get('/forfait/manage','manage')->name('forfait.manage');
        });
        Route::controller(RDVPController::class)->group(function (){
            Route::get('/RDVP/create','index')->name('RDVP.create');
            Route::get('/RDVP/manage','manage')->name('RDVP.manage');
        });
    });
});


Route::middleware(['auth', 'verified','role:barber'])->group(function () {
    Route::prefix('barber')->group(function (){
        Route::controller(BarberMainController::class)->group(function (){
            Route::get('dashboard','index')->name('barber.dashboard');
        });
        Route::controller(CalendarController::class)->group(function (){
            Route::get('/calendar/calendar','calendar')->name('barber.calendar.calendar');
        });
    });
});

Route::middleware(['auth', 'verified','role:user'])->group(function () {
    Route::prefix('customer')->group(function (){
        Route::controller(CustomerMainController::class)->group(function (){
            Route::get('dashboard','index')->name('customer.dashboard');
            Route::get('affiliate','affiliate')->name('customer.affiliate');
            Route::get('payment','payment')->name('customer.payment');
            Route::get('history','history')->name('customer.history');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
