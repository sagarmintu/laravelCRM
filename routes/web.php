<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);

    Route::group(['prefix' => 'leads'], function(){
        Route::get('/add-lead', [AdminController::class, 'add_lead']);
        Route::post('/add-lead', [AdminController::class, 'add_lead']);
        Route::get('/manage-leads', [AdminController::class, 'manage_leads']);
        Route::get('/delete-lead/{id}', [AdminController::class, 'delete_lead']);
        Route::get('/edit-lead/{id}', [AdminController::class, 'edit_lead']);
        Route::post('/edit-lead/{id}', [AdminController::class, 'edit_lead']);
        Route::get('/view-lead/{id}', [AdminController::class, 'view_lead']);
        Route::get('/convert-lead/{id}', [AdminController::class, 'convert_lead']);
        Route::post('/convert-lead/{id}', [AdminController::class, 'convert_lead']);
    });

    Route::group(['prefix' => 'accounts'], function(){
        Route::get('/manage-accounts', [AdminController::class, 'manage_accounts']);
    });

    Route::group(['prefix' => 'contacts'], function(){
        Route::get('/manage-contacts', [AdminController::class, 'manage_contacts']);
    });

    Route::group(['prefix' => 'deals'], function(){
        Route::get('/manage-deals', [AdminController::class, 'manage_deals']);
    });

});