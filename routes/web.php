<?php

use App\Http\Controllers\AdminController;
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

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisations');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'profile_store']);


    Route::get('/permissions',[AdminController::class, 'permissions'])->name('userManagement.permissions');
    Route::get('/process/permission/{id?}', [AdminController::class, 'process_permission'])->name('userManagement.processPermission');
    Route::post('/process/permission/{id?}', [AdminController::class, 'process_permission_store']);

    Route::get('/roles',[AdminController::class,'roles'])->name('userManagement.roles');
    Route::get('/process/role/{id?}', [AdminController::class, 'process_roles'])->name('userManagement.processRoles');
    Route::post('/process/role/{id?}', [AdminController::class, 'process_roles_store']);

    Route::get('/users',[AdminController::class, 'users'])->name('userManagement.users');
    Route::get('/process/user/{id?}',[AdminController::class,'process_user'])->name('userManagement.processUsers');
    Route::post('/process/user/{id?}',[AdminController::class,'process_user_store']);

});


require __DIR__ . '/auth.php';
