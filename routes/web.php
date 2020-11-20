<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/organisations', [AdminController::class, 'organisations'])->name('organisations');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'profile_store']);


    Route::get('/permissions',[AdminController::class, 'permissions'])->name('userManagement.permissions');
    Route::get('/create/permission/{id?}', [AdminController::class, 'create_permission'])->name('userManagement.processPermission');
    Route::post('/create/permission/{id?}', [AdminController::class, 'create_permission_store']);

    Route::get('/roles',[AdminController::class,'roles'])->name('userManagement.roles');
    Route::get('/create/roles', [AdminController::class, 'create_roles'])->name('userManagement.createRoles');
    Route::post('/create/roles', [AdminController::class, 'create_roles_store']);

});


require __DIR__ . '/auth.php';
