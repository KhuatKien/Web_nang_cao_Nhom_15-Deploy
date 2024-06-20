<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TableAdminController;
use App\Http\Controllers\RoomAdminController;
use App\Http\Controllers\RoomTypeAdminController;
use App\Http\Controllers\BookingAdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BillAdminController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

//User
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/room', [RoomController::class, 'roomlist'])->name('roomlist');
Route::get('/room/{roomType}', [RoomController::class, 'detail'])->name('detail');
Route::get('/get-rooms/{roomType}', [RoomController::class, 'getRoomsByType'])->name('get.rooms.by.type');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/about', [AboutController::class, 'about'])->name('about');


//SSO Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

//Admin
// Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/loginadmin', [AdminController::class, 'loginadmin'])->name('loginadmin');
Route::post('/loginadmin', [AdminController::class, 'postLoginAdmin']);

//User
// Route::get('/admin/users', [UserController::class, 'users'])->name('users.index');
// Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
// Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');

    //User Admin
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    //Table Admin
    Route::get('/admin/tables', [TableAdminController::class, 'index'])->name('admin.tables.index');
    Route::post('/admin/tables', [TableAdminController::class, 'store'])->name('admin.tables.store');
    Route::put('/admin/tables/{id}', [TableAdminController::class, 'update'])->name('admin.tables.update');
    Route::post('/admin/tables/confirm/{id}', [TableAdminController::class, 'confirm'])->name('admin.tables.confirm');
    Route::delete('/admin/tables/{id}', [TableAdminController::class, 'destroy'])->name('admin.tables.destroy');

    //RoomType Admin
    Route::get('/admin/roomtypes', [RoomTypeAdminController::class, 'index'])->name('admin.roomtypes.index');
    Route::put('/admin/roomtypes/{id}/activate', [RoomTypeAdminController::class, 'activate'])->name('admin.roomtypes.activate');
    Route::put('/admin/roomtypes/{id}/deactivate', [RoomTypeAdminController::class, 'deactivate'])->name('admin.roomtypes.deactivate');

    //Room Admin
    Route::get('/admin/rooms', [RoomAdminController::class, 'index'])->name('admin.rooms.index');
    Route::post('/admin/rooms', [RoomAdminController::class, 'store'])->name('admin.rooms.store');
    Route::delete('/admin/rooms/{id}', [RoomAdminController::class, 'destroy'])->name('admin.rooms.destroy');

    // Booking Admin
    Route::get('/admin/bookings', [BookingAdminController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{id}/confirm', [BookingAdminController::class, 'confirmBooking'])->name('admin.bookings.confirm');
    Route::post('/admin/bookings/{id}/bill', [BookingAdminController::class, 'createBill'])->name('admin.bookings.bill');

    //Bill Admin
    Route::get('/admin/bills', [BillAdminController::class, 'index'])->name('admin.bills.index');
});

//Restaurant
Route::get('/restaurant', [RestaurantController::class, 'restaurant'])->name('restaurant');
Route::get('/tablelist', [RestaurantController::class, 'tablelist'])->name('tablelist');
Route::post('/table/book', [RestaurantController::class, 'bookTable'])->name('table.book');

//Profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

//Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

if(App::environment('production')){
    URL::forceScheme('https');
}