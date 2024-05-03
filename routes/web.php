<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\YoutubeVideoController;

Route::group(['prefix' => '7439','middleware' => ['admin','PreventBackPage']], function(){

    //GET METHODS
    Route::get('login',[AuthController::class,'loginView']);
    //POST METHODS
    Route::post('login',[AuthController::class,'login'])->name('login');

    route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'organizations'],function(){
        // GET METHODS
        // Route::get('',[OrganizationController::class,'index'])->name('organizations.index');

        // POST METHODS
        
    });

    Route::group(['prefix' => 'youtube-videos'],function(){
        // GET METHODS
        Route::get('',[YoutubeVideoController::class,'index'])->name('youtube-videos.index');
        Route::get('create',[YoutubeVideoController::class,'create'])->name('youtube-videos.create');;
        Route::get('edit',[YoutubeVideoController::class,'edit'])->name('youtube-videos.edit');

        // POST METHODS
        Route::POST('store',[YoutubeVideoController::class,'store'])->name('youtube-videos.store');;
        Route::POST('update',[YoutubeVideoController::class,'update'])->name('youtube-videos.update');
    });
});


Route::get('coming-soon',[DashboardController::class,'comingSoon'])->name('coming-soon');
Route::get('load-video',[DashboardController::class,'LoadVideo'])->name('load-video');
Route::post('contact-mail',[SendMailController::class,'SendContactMail'])->name('contact-mail');