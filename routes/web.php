<?php

use App\Http\Controllers\After_login_controller;
use App\Http\Controllers\Before_login_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\My_Controller;



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('admin_header','master_view');
Route::view('register_form','Admin/register_form');
Route::view('login_form','Admin/login_form');
Route::view('admin_dashboard','Admin/dashboard');
Route::view('total_users','Admin/total_users');
Route::view('admin_profile','Admin/admin_profile');

//Before login---------------------------------------------------------------------------------------------
Route::get('home',[Before_login_Controller::class,'home_data']);
// Route::get('fetch',[Before_login_Controller::class,'fetch_data']);
Route::get('About_Us',[Before_login_Controller::class,'about_data']);
// Route::get('/delete/{email}',[sample_controller::class,'delete_data']);
Route::get('Contact_Us',[Before_login_Controller::class,'contact_data']);
Route::get('Gallery',[Before_login_Controller::class,'gallery_data']);
Route::get('Franchise',[Before_login_Controller::class,'franchise_data']);
Route::get('Movies',[Before_login_Controller::class,'movies_data']);
Route::view('Login','Before_login/login_form');


//After login---------------------------------------------------------------------------------------------
Route::get('After_home',[After_login_controller::class,'After_home_data']);
Route::get('After_About_Us',[After_login_controller::class,'After_about_data']);
Route::get('After_Contact_Us',[After_login_controller::class,'After_contact_data']);
Route::get('After_Gallery',[After_login_controller::class,'After_gallery_data']);
Route::get('After_Franchise',[After_login_controller::class,'After_franchise_data']);
Route::get('After_Movies',[After_login_controller::class,'After_movies_data']);
// Route::view('Login','Before_login/login_form');

Route::view('After_profile','After_login/Profile');
Route::view('Edit','After_login/Edit_profile');