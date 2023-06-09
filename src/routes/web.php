<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/topic')->group(function(){
    Route::get('/' , [TopicController::class , 'index'])->name('topic.index');
    Route::get('/new' , [TopicController::class , 'new'])->name('topic.new');
    Route::post('/store' , [TopicController::class , 'store'])->name('topic.store');
    Route::get('/{topic}' , [TopicController::class , 'show'])->name('topic.show');
    Route::post('/{topic}/reply' , [ReplyController::class , 'store'])->name('reply.store');
});

Route::prefix('/badge')->group(function(){
    Route::get('/new' , [BadgeController::class , 'new'])->name('badge.new');
    Route::post('/store' , [BadgeController::class , 'store'])->name('badge.store');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
