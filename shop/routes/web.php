<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

Route::get('admin/user/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/user/login/store', [LoginController::class, 'store']);

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);
    
        #menu
        Route::prefix('menu')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::delete('destroy',[MenuController::class,'destroy']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
        });

        #product
        Route::prefix('products')->group(function(){

        });

    });

});


