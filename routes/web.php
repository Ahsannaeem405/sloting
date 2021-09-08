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


Route::get('/reset', function() {
    session()->forget('PLAY_ID');
});
Route::get('/seed', function() {
    Artisan::call('db:seed');
});
Route::get('/migrate', function() {
   Artisan::call('migrate');
});
Route::get('/cache', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        $run = Artisan::call('optimize');
        Session::flush();
        return 'FINISHED';  
    });
Route::get('/migrate', function() {
         Artisan::call('migrate');
        });
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('index');
// });
 // Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
 // Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
 Route::get('/',[UserController::class,'index']);
 Route::post('/getData',[UserController::class,'getData']);
 Route::get('/url_link',[UserController::class,'url_link']);
 Route::get('/url_link3',[UserController::class,'url_link3']);
 Route::get('/url_link4',[UserController::class,'url_link4']);
 Route::get('/fb_link',[UserController::class,'fb_link']);
 Route::get('/reset',[UserController::class,'reset']);


 //Admin

 // Route::get('admin/login',[AdminController::class,'login']);
  Route::get('admin/',[AdminController::class,'index']);
  Route::get('admin/users',[AdminController::class,'users']);
  Route::get('admin/assets',[AdminController::class,'assets']);
  Route::get('admin/links',[AdminController::class,'links']);
  Route::post('admin/addAssets',[AdminController::class,'addAssets']);
  Route::get('/usersDelete/{id}',[AdminController::class,'usersDelete']);
  Route::post('assetEdit/{id}',[AdminController::class,'assetEdit']);
  Route::post('admin/assetUpdate/{id}',[AdminController::class,'assetUpdate']);
  Route::post('admin/linkUpdate/{id}',[AdminController::class,'linkUpdate']);
  Route::get('/assetDelete/{id}',[AdminController::class,'assetDelete']);
  Route::get('/test',[AdminController::class,'test']);
  Route::get('/Profile',[AdminController::class,'Profile']);
  Route::post('/updateProfile',[AdminController::class,'updateProfile']);

// Route::get('facebook/callback', [UserController::class, 'handleFacebookCallback']);


Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
})->name('dashboard');
