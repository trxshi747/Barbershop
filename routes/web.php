<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'our_services'])->name('our_services');
// Routes d'authentification

Route::middleware('guest')->group(function () {
    // Vue unique de connexion
    Route::get('/admin/login', [App\Http\Controllers\AuthController::class, 'viewlogin'])->name('view.login');
    
    // Soumission des formulaires
    Route::post('/admin/login', [App\Http\Controllers\AuthController::class, 'adminLogin'])->name('check.login');
    Route::post('/coiffeur/login', [App\Http\Controllers\AuthController::class, 'coiffeurLogin'])->name('coiffeur.login');
});

// Déconnexion
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Zone Admin
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('index', [App\Http\Controllers\admins\AdminsController::class, 'index'])->name('admins.dashboard');
    
});

// Zone Coiffeu

Route::prefix('coiffeur')->middleware('auth.Coiffeur')->group(function () {
    //Route::get('/dashboard', [App\Http\Controllers\CoiffeurS::class, 'dashboard'])->name('coiffeur.dashboard');
    Route::get('/calendrier', [App\Http\Controllers\Coiffeurs::class, 'calendrier'])->name('coiffeur.dashboard');
     Route::post('/calendrier', [App\Http\Controllers\Coiffeurs::class, 'updateDisponibilite'])->name('coiffeur.disponibilite.update');
     Route::delete('/delete-disponibilite/{id}', [App\Http\Controllers\Coiffeurs::class, 'deleteDisponibilite'])->name('coiffeur.disponibilite.delete');
});



//admins
Route::get('all-adminss', [App\Http\Controllers\admins\AdminsController::class, 'displayAllAmins'])->name('all.admins');
Route::get('create-admins', [App\Http\Controllers\admins\AdminsController::class, 'createAdmins'])->name('Create.Admins');
Route::post('create-admins', [App\Http\Controllers\admins\AdminsController::class, 'storeAdmins'])->name('store.Admins');
Route::DELETE('Delete-Admin/{id}', [App\Http\Controllers\admins\AdminsController::class, 'DeleteAdmin'])->name('Delete.Admin');
Route::get('Modifier-Admin/{id}', [App\Http\Controllers\admins\AdminsController::class, 'ModifieraAdmins'])->name('Modifier.Admins');
Route::put('Modifier-Admin/{id}', [App\Http\Controllers\admins\AdminsController::class, 'UpdateAdmins'])->name('Update.Admins');
//services

Route::get('all-Services', [App\Http\Controllers\admins\AdminsController::class, 'displayServices'])->name('all.Services');
Route::get('Create-Services', [App\Http\Controllers\admins\AdminsController::class, 'CreateServices'])->name('Create.Services');
Route::post('Create-Services', [App\Http\Controllers\admins\AdminsController::class, 'StoreServices'])->name('Store.Services');
Route::get('Delete-Services/{id}', [App\Http\Controllers\admins\AdminsController::class, 'DeleteServices'])->name('Delete.Services');
Route::get('Modifier-Services/{id}', [App\Http\Controllers\admins\AdminsController::class, 'ModifierServices'])->name('Modifier.Services');
Route::put('Modifier-Services/{id}', [App\Http\Controllers\admins\AdminsController::class, 'UpdateServices'])->name('Update.Services');
//Packs 
Route::get('all-Packs', [App\Http\Controllers\admins\AdminsController::class, 'displayPacks'])->name('all.Packs');
Route::get('Create-Packs', [App\Http\Controllers\admins\AdminsController::class, 'CreatePacks'])->name('Create.Packs');
Route::post('Create-Packs', [App\Http\Controllers\admins\AdminsController::class, 'StorePacks'])->name('Store.Packs');
Route::get('Delete-Packs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'DeletePacks'])->name('Delete.Packs');
Route::get('Modifier-Packs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'ModifierPacks'])->name('Modifier.Packs');
Route::put('Modifier-Packs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'UpdatePacks'])->name('Update.Packs');
//RDV
Route::get('all-Booking', [App\Http\Controllers\admins\AdminsController::class, 'displayBooking'])->name('all.booking');
// routes/web.php
Route::get('/admin/bookings/{booking}/available-coiffeurs', [App\Http\Controllers\BookingController::class, 'getAvailableCoiffeurs'])
     ->name('admin.bookings.availableCoiffeurs');

Route::put('/admin/bookings/{booking}/assign', [App\Http\Controllers\BookingController::class, 'assignCoiffeur'])
    ->name('admin.bookings.assign');
    Route::get('/admin/bookings/create', [App\Http\Controllers\AdminBookingController::class, 'create'])->name('admin.bookings.create');
    Route::post('/admin/bookings', [App\Http\Controllers\AdminBookingController::class, 'store'])->name('admin.bookings.store');
// coiffeurs

Route::get('Coiffeurs', [App\Http\Controllers\admins\AdminsController::class, 'displayCoiffeur'])->name('admin.coiffeurs.index');
Route::get('CreerCoiffeurs', [App\Http\Controllers\admins\AdminsController::class, 'CreerCoiffeur'])->name('admin.coiffeurs.create');
Route::post('Coiffeurs', [App\Http\Controllers\admins\AdminsController::class, 'StoreCoiffeur'])->name('admin.coiffeurs.store');
Route::delete('Delete-Coiffeurs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'DeleteCoiffeur'])->name('admin.coiffeurs.delete');
Route::get('Modifier-Coiffeurs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'ModifierCoiffeurs'])->name('admin.coiffeurs.modifier');
Route::put('Modifier-Coiffeurs/{id}', [App\Http\Controllers\admins\AdminsController::class, 'updateCoiffeurs'])->name('admin.coiffeurs.update');

//Packs
Route::get('/packs', [App\Http\Controllers\PackController::class, 'our_packs'])->name('our_packs');
Route::post('/services/select', [App\Http\Controllers\BookingController::class, 'selectServices'])->name('services.select');
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'showBookingForm'])->name('booking.show');
Route::post('/booking', [App\Http\Controllers\BookingController::class, 'storeBooking'])->name('booking.store')->middleware('auth');
Route::get('/checkout', [App\Http\Controllers\BookingController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [App\Http\Controllers\BookingController::class, 'store_checkout'])->name('checkout.store')->middleware('auth');
Route::get('/checkout/success', [App\Http\Controllers\BookingController::class, 'checkoutSuccess'])->name('checkout.success');
Route::middleware(['auth'])->group(function () {
    Route::get('/my-bookings', [App\Http\Controllers\MyBookingsController::class, 'index'])->name('mybookings');
    Route::delete('/my-bookings/{booking}', [App\Http\Controllers\MyBookingsController::class, 'destroy'])->name('bookings.destroy');
});


    Route::get('/myfeedbacks', [App\Http\Controllers\FeedbackController::class, 'index'])->name('myfeedbacks.index');
    Route::post('/myfeedbacks', [App\Http\Controllers\FeedbackController::class, 'store']);
    Route::delete('/myfeedbacks/{feedback}', [App\Http\Controllers\FeedbackController::class, 'destroy'])->name('myfeedbacks.destroy');

Route::get('/feedbacks', [App\Http\Controllers\FeedbackController::class, 'publicIndex'])->name('allfeedbacks.index');