<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'profile_store']);


    Route::get('/permissions',[PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/process/permission/{id?}', [PermissionController::class, 'process'])->name('permissions.process');
    Route::post('/process/permission/{id?}', [PermissionController::class, 'store']);
    Route::get('/delete/permission/{id}',[PermissionController::class,'destroy'])->name('permissions.destroy');

    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::get('/process/role/{id?}', [RoleController::class, 'process'])->name('roles.process');
    Route::post('/process/role/{id?}', [RoleController::class, 'store']);

    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::get('/process/user/{id?}',[UserController::class,'process'])->name('users.process');
    Route::post('/process/user/{id?}',[UserController::class,'store']);


    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/contacts',[ContactController::class, 'index'])->name('leads.contact');

    Route::get('/process/contact/{id?}', [ContactController::class, 'process'])->name('leads.contact.process');
    Route::post('/process/contact/{id?}', [ContactController::class, 'store']);

    Route::get('/process/leads/{id?}', [LeadController::class, 'process'])->name('leads.process');
    Route::post('/process/leads/{id?}', [LeadController::class, 'process_leads_store']);

});


require __DIR__ . '/auth.php';
