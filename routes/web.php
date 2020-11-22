<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganisationController;

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
    Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisations');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'profile_store']);


    Route::get('/permissions',[PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/process/permission/{id?}', [PermissionController::class, 'process_permission'])->name('permissions.process');
    Route::post('/process/permission/{id?}', [PermissionController::class, 'process_permission_store']);

    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::get('/process/role/{id?}', [RoleController::class, 'process_roles'])->name('roles.process');
    Route::post('/process/role/{id?}', [RoleController::class, 'process_roles_store']);

    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::get('/process/user/{id?}',[UserController::class,'process_user'])->name('users.process');
    Route::post('/process/user/{id?}',[UserController::class,'process_user_store']);

});


require __DIR__ . '/auth.php';
