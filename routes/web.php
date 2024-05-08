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
        Route::GET('',[YoutubeVideoController::class,'index'])->name('youtube-videos.index');
        Route::GET('create',[YoutubeVideoController::class,'create'])->name('youtube-videos.create');
        Route::GET('edit/{id}',[YoutubeVideoController::class,'edit'])->name('youtube-videos.edit');
        Route::GET('ajax-list',[YoutubeVideoController::class,'ajaxList'])->name('youtube-videos.ajax-list');
        Route::GET('delete/{id}',[YoutubeVideoController::class,'softDelete'])->name('youtube-videos.soft-delete');

        // POST METHODS
        Route::POST('store',[YoutubeVideoController::class,'store'])->name('youtube-videos.store');;
        Route::POST('update',[YoutubeVideoController::class,'update'])->name('youtube-videos.update');
    });
});

Route::get('',[DashboardController::class,'comingSoon'])->name('coming-soon');
Route::get('load-video',[DashboardController::class,'LoadVideo'])->name('load-video');
Route::post('contact-mail',[SendMailController::class,'SendContactMail'])->name('contact-mail');


Route::get('clear',function(){
        // Clear application cache
        Artisan::call('cache:clear');
        
        // Clear route cache
        Artisan::call('route:clear');
        
        // Clear config cache
        Artisan::call('config:clear');
        
        // Clear view cache
        Artisan::call('view:clear');
        
        // Clear compiled views
        Artisan::call('clear-compiled');
        
        // Clear application cache
        Artisan::call('optimize:clear');
        
        return "Caches cleared successfully.";
});