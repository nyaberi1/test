<?php

use App\Models\Listing;
use Illuminae\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//All listings
Route::get('/',[ListingController::class,'index']);


//show create form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//stoe listing data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');


//show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update listing
Route::put('listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//delete listing
Route::delete('listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//manage listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware    ('auth');




//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);




///show register form 
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class,'store']);


//logout user 
Route::post('/logout', [UserController::class,'logout'])->middleware('auth'); 


//show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);



?>