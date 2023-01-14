<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SpamCheckerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpamController;
use App\Http\Controllers\WordController;
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

//login Page 
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(["middleware" => ["admin"]], function(){

    // SpamChecker for Admin
    Route::get('spam_checker', [SpamController::class, 'dashboard_index'])->name('layout.index');
    Route::get('search', [SpamController::class, 'search']);
    // Category
    Route::get('category', [SpamController::class, 'index'])->name('Category.index');
    Route::get('create_category', [SpamController::class, 'create'])->name('Category.create');
    Route::post('store_category', [SpamController::class, 'store']);
    Route::get('edit/{id}', [SpamController::class, 'edit']);
    Route::put('update/{id}', [SpamController::class, 'update']);
    // Word
    Route::get('word', [WordController::class, 'index'])->name('Word.index');
    Route::get('create_word', [WordController::class, 'create'])->name('Word.create');
    Route::post('store_word', [WordController::class, 'store']);
    Route::get('editw/{id}', [WordController::class, 'editw'])->name('Word.edit');
    Route::put('updatew/{id}', [WordController::class, 'updatew']);
    //for import-export data
    Route::get('/file-import',[WordController::class,'importView'])->name('import-view');
    Route::post('/import',[WordController::class,'import'])->name('import');
    Route::get('/export-users',[WordController::class,'exportUsers'])->name('export-users');
    });

    Route::group(["middleware" => ["user"]], function(){
    // SpamChecker for user
    Route::get('spam_checker_user', [SpamController::class, 'dashboard_index'])->name('layout.index');
    //for send email
    Route::get('/sendemail', [WordController::class, 'index1']);
    Route::Post('/sendemail/send', [WordController::class, 'store1']);
});

