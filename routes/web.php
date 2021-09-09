<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacebookController;
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


Route::any('/reset', function() {
    session()->forget('PLAY_ID');
});
Route::any('/seed', function() {
    Artisan::call('db:seed');
});
Route::any('/linkseed', function() {
    Artisan::call('db:seed link');
});
Route::any('/migrate', function() {
   Artisan::call('migrate');
});
Route::any('/optimize', function() {
 $run = Artisan::call('optimize');
        return 'FINISHED';  
    });
Route::any('/cache', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        $run = Artisan::call('optimize');
        Session::flush();
        return 'FINISHED';  
    });
Route::any('/migrate', function() {
         Artisan::call('migrate');
        });
// Route::any('/', function () {
//     return view('welcome');
// });
// Route::any('/', function () {
//     return view('index');
// });

Route::get('login/facebook', [App\Http\Controllers\FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback']);

// Route::any('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
 //Route::any('facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
 Route::any('/',[UserController::class,'index']);
 Route::post('/getData',[UserController::class,'getData']);
 Route::any('/url_link',[UserController::class,'url_link']);
 Route::any('/url_link3',[UserController::class,'url_link3']);
 Route::any('/url_link4',[UserController::class,'url_link4']);
 Route::any('/fb_link',[UserController::class,'fb_link']);
 Route::any('/reset',[UserController::class,'reset']);


 //Admin

 // Route::any('admin/login',[AdminController::class,'login']);
  Route::any('admin/',[AdminController::class,'index']);
  Route::any('admin/users',[AdminController::class,'users']);
  Route::any('admin/assets',[AdminController::class,'assets']);
  Route::any('admin/links',[AdminController::class,'links']);
  Route::post('admin/addAssets',[AdminController::class,'addAssets']);
  Route::any('/usersDelete/{id}',[AdminController::class,'usersDelete']);
  Route::post('assetEdit/{id}',[AdminController::class,'assetEdit']);
  Route::post('admin/assetUpdate/{id}',[AdminController::class,'assetUpdate']);
  Route::post('admin/linkUpdate/{id}',[AdminController::class,'linkUpdate']);
  Route::any('/assetDelete/{id}',[AdminController::class,'assetDelete']);
  Route::any('/test',[AdminController::class,'test']);
  Route::any('/Profile',[AdminController::class,'Profile']);
  Route::post('/updateProfile',[AdminController::class,'updateProfile']);
    Route::any('admin/logo',[AdminController::class,'logo']);
  Route::post('admin/addLogo',[AdminController::class,'addLogo']);
  Route::post('admin/logoUpdate/{id}',[AdminController::class,'logoUpdate']);

// Route::any('facebook/callback', [UserController::class, 'handleFacebookCallback']);


Route::middleware(['auth:sanctum', 'verified'])->any('/admin', function () {
    return view('admin.index');
})->name('dashboard');



