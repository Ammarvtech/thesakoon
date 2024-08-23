<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ServiceProviderController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminServiceController;
// dd("here");
// Route::get('/', function () {
//     return view('welcome');
// });




// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// about 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/company_detail/{id}', [HomeController::class, 'company_detail'])->name('company_detail');
Route::post('/delete_image', [HomeController::class, 'delete_image'])->name('delete.image');

// dashboard route with auth middleware
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user_dashboard', [DashboardController::class, 'user_dashboard'])->name('user_dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'profile'])->name('profile');

    Route::post('/user_profile', [HomeController::class, 'user_profile'])->name('user_profile');
    Route::get('/user_profile', [HomeController::class, 'user_profile'])->name('user_profile');
    Route::get('/change_password', [HomeController::class, 'change_password'])->name('change_password');
    Route::post('/change_password', [HomeController::class, 'change_password'])->name('change_password');

    Route::get('/bookings', [HomeController::class, 'bookings'])->name('bookings');
    Route::get('/my_services', [ServiceController::class, 'index'])->name('my_services');
    Route::get('/add_service', [ServiceController::class, 'add_service'])->name('add_service');
    Route::post('/add_service', [ServiceController::class, 'add_service'])->name('add_service');

    // booking routes
    Route::get('/book_service/{id}', [HomeController::class, 'book_service'])->name('book_service');
    Route::post('/book_service/{id}', [HomeController::class, 'book_service'])->name('book_service');
    Route::get('/booking_success', [HomeController::class, 'booking_success'])->name('booking_success');

    Route::get('/delete_user/{id}', [HomeController::class, 'delete_user'])->name('delete_user');
    Route::get('/edit_user/{id}', [HomeController::class, 'edit_user'])->name('edit_user');

    Route::get('/delete_service/{id}', [HomeController::class, 'delete_service'])->name('delete_service');
    Route::get('/restore_service/{id}', [HomeController::class, 'restore_service'])->name('restore_service');

    Route::get('/edit_service/{id}', [HomeController::class, 'edit_service'])->name('edit_service');
    Route::get('/approve_service/{id}', [HomeController::class, 'approve_service'])->name('approve_service');

    // service provider routes with namespace
    
    
    Route::get('/service_provider', [ServiceProviderController::class, 'index'])->name('service_provider.dashboard');
    // service provider routes
    Route::get('/service_provider/services', [ServiceProviderController::class, 'services'])->name('service_provider.services');
    Route::get('/service_provider/add_service', [ServiceProviderController::class, 'add_service'])->name('service_provider.add_service');
    Route::post('/service_provider/add_service', [ServiceProviderController::class, 'add_service'])->name('service_provider.add_service');
    Route::get('/service_provider/delete_service/{id}', [ServiceProviderController::class, 'delete_service'])->name('service_provider.delete_service');
    Route::get('/service_provider/edit_service/{id}', [ServiceProviderController::class, 'edit_service'])->name('service_provider.edit_service');
    Route::post('/service_provider/edit_service/{id}', [ServiceProviderController::class, 'edit_service'])->name('service_provider.edit_service');
    Route::get('/service_provider/approve_service/{id}', [ServiceProviderController::class, 'approve_service'])->name('service_provider.approve_service');
    Route::get('/service_provider/restore_service/{id}', [ServiceProviderController::class, 'restore_service'])->name('service_provider.restore_service');
    //profile
    Route::get('/service_provider/profile', [ServiceProviderController::class, 'profile'])->name('service_provider.profile');
    Route::post('/service_provider/profile', [ServiceProviderController::class, 'profile'])->name('service_provider.profile');

    // time slots
    Route::get('/service_provider/time_slots', [ServiceProviderController::class, 'time_slots'])->name('service_provider.time_slots');
    Route::get('/service_provider/add_time_slot', [ServiceProviderController::class, 'add_time_slot'])->name('service_provider.add_time_slot');
    Route::post('/service_provider/add_time_slot', [ServiceProviderController::class, 'add_time_slot'])->name('service_provider.add_time_slot');
    Route::get('/service_provider/delete_time_slot/{id}', [ServiceProviderController::class, 'delete_time_slot'])->name('service_provider.delete_time_slot');
    Route::get('/service_provider/edit_time_slot/{id}', [ServiceProviderController::class, 'edit_time_slot'])->name('service_provider.edit_time_slot');
    Route::post('/service_provider/edit_time_slot/{id}', [ServiceProviderController::class, 'edit_time_slot'])->name('service_provider.edit_time_slot');

    //approve_booking 
    Route::get('/service_provider/approve_booking/{id}', [ServiceProviderController::class, 'approve_booking'])->name('service_provider.approve_booking');
    Route::get('/service_provider/reject_booking/{id}', [ServiceProviderController::class, 'reject_booking'])->name('service_provider.reject_booking');
    //booking_details
    Route::get('/service_provider/booking_details/{id}', [ServiceProviderController::class, 'booking_details'])->name('service_provider.booking_details');

    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin_dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // saloon
    Route::get('/admin_dashboard/saloons', [AdminController::class, 'saloons'])->name('admin.saloons');
    Route::get('/admin_dashboard/add_saloon', [AdminController::class, 'add_saloon'])->name('admin.add_saloons');

    Route::get('/admin_dashboard/masters', [AdminController::class, 'masters'])->name('admin.masters'); 
    Route::get('/admin_dashboard/add_masters', [AdminController::class, 'add_masters'])->name('admin.add_master');
    Route::post('/admin_dashboard/add_masters',[AdminController::class, 'add_masters'])->name('admin.add_master');
    Route::get('/admin_dashboard/edit_masters/{id}',[AdminController::class, 'edit_masters'])->name('admin.edit_masters');
    Route::post('/admin_dashboard/edit_masters/{id}',[AdminController::class, 'edit_masters'])->name('admin.edit_masters');

    Route::get('/admin_dashboard/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/admin_dashboard/add_customers', [AdminController::class, 'add_customers'])->name('admin.add_customers');

    Route::get('/admin_dashboard/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin_dashboard/view_booking/{id}', [AdminController::class, 'view_booking'])->name('admin.view_booking');
    Route::get('/admin_dashboard/edit_booking/{id}', [AdminController::class, 'edit_booking'])->name('admin.edit_booking');
    Route::post('/admin_dashboard/edit_booking/{id}', [AdminController::class, 'edit_booking'])->name('admin.edit_booking');
    Route::get('/admin_dashboard/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('admin.delete_booking');
    Route::get('/admin_dashboard/restore_booking/{id}', [AdminController::class, 'restore_booking'])->name('admin.restore_booking');

    Route::get('/admin_dashboard/profile', [AdminController::class, 'profile'])->name('admin.profile');

    // users 
    Route::get('/admin_dashboard/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin_dashboard/delete_user/{id}', [AdminController::class, 'delete_user'])->name('admin.delete_user');
    Route::get('/admin_dashboard/edit_user/{id}', [AdminController::class, 'edit_user'])->name('admin.edit_user');
    Route::post('/admin_dashboard/edit_user/{id}', [AdminController::class, 'edit_user'])->name('admin.edit_user');

    // services 
    Route::get('/admin_dashboard/services', [AdminServiceController::class, 'index'])->name('admin.services');
    Route::get('/admin_dashboard/delete_service/{id}', [AdminServiceController::class, 'delete_service'])->name('admin.delete_service');
    Route::get('/admin_dashboard/restore_service/{id}', [AdminServiceController::class, 'restore_service'])->name('admin.restore_service');
    Route::get('/admin_dashboard/edit_service/{id}', [AdminServiceController::class, 'edit_service'])->name('admin.edit_service');
    Route::get('/admin_dashboard/approve_service/{id}', [AdminServiceController::class, 'approve_service'])->name('admin.approve_service');
    Route::get('/admin_dashboard/restore_service/{id}', [AdminServiceController::class, 'restore_service'])->name('admin.restore_service');
    Route::get('/admin_dashboard/add_service', [AdminServiceController::class, 'add_service'])->name('admin.add_service');
    Route::post('/admin_dashboard/add_service', [AdminServiceController::class, 'add_service'])->name('admin.add_service');

    // logout 
    Route::get('/admin_logout', [AdminController::class, 'logout'])->name('admin.admin_logout');
    
});
// admin routes with middleware 
// Route::group(['middleware' => 'admin'], function () {

// });
