<?php

use App\Http\Controllers\AccountController;
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


    Route::get('/convert/leads/{id}',[LeadController::class, 'convert'])->name('leads.convert');
    Route::post('/convert/leads/{id}',[LeadController::class, 'convert_store']);
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');

    Route::get('/process/leads/{id?}', [LeadController::class, 'process'])->name('leads.process');
    Route::get('/delete/lead/{id}',[LeadController::class, 'destroy'])->name('leads.destroy');
    Route::post('/process/leads/{id?}', [LeadController::class, 'store']);
    Route::get('/leads/{id}',[LeadController::class, 'show'])->name('leads.show');



    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');


});


require __DIR__ . '/auth.php';
