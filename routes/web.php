<?php

use App\Http\Controllers\After_login_controller;
use App\Http\Controllers\Before_login_Controller;
use App\Http\Controllers\My_Controller;
use Illuminate\Support\Facades\Route;




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

Route::get('/', function () {
    return redirect('home');
});



// Admin Start

// // Route::view('admin_header','master_view');
// Route::view('register_form','register_form');
// Route::view('login_form','login_form'); 

// Route::view('login_form','login_form');
Route::view('admin_dashboard','Admin/dashboard');   //Dashboard
Route::view('user_add','Admin/user_add');
Route::get('users_total',[My_Controller::class,'fetch_total']);
Route::get('users_normal',[My_Controller::class,'fetch_normal']);
Route::get('users_admin',[My_Controller::class,'fetch_admin']);
Route::view('admin_profile','Admin/admin_profile');
Route::view('admin_profile_edit','Admin/admin_profile_edit');


Route::get('movies',[My_Controller::class,'fetch_movies']);
Route::view('movie_add','Admin/movie_add');

Route::view('movies_upcoming','Admin/movies_upcoming');
Route::view('movies_add_upcom','Admin/movies_add_upcom');

Route::view('movies_top','Admin/movies_top');
Route::view('movies_add_top','Admin/movies_add_top');

Route::view('products','Admin/products');
Route::view('products_add','Admin/products_add');

Route::view('orders','Admin/orders');
Route::view('order_add','Admin/order_add');

Route::view('review_rating','Admin/review_rating');
Route::view('products_deleted','Admin/products_deleted');
Route::view('users_deleted','Admin/users_deleted');
Route::view('messages','Admin/messages');


Route::post('form_controller',[My_controller::class,'validate_form']);
Route::post('movie_controller',[My_controller::class,'validate_movie']);
Route::post('upcom_movie_controller',[My_controller::class,'validate_upcom_movie']);
Route::post('top_movie_controller',[My_controller::class,'validate_top_movie']);
Route::post('product_controller',[My_controller::class,'validate_product']);
Route::post('order_controller',[My_controller::class,'validate_order']);

// Admin End










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

// activate register account

Route::get('account_activation/{email}',[Before_login_Controller::class,'Activate']);

Route::view('forget','forget_password');
Route::get('forget_pass',[Before_login_Controller::class,'forget']);
Route::view('forget_change_pass','change_pass');
Route::get('change_forget_password',[Before_login_Controller::class,'change_password']);













//After login---------------------------------------------------------------------------------------------
Route::get('After_home',[After_login_controller::class,'After_home_data']);
Route::get('After_About_Us',[After_login_controller::class,'After_about_data']);
Route::get('After_Contact_Us',[After_login_controller::class,'After_contact_data']);
Route::get('After_Gallery',[After_login_controller::class,'After_gallery_data']);
Route::get('After_Franchise',[After_login_controller::class,'After_franchise_data']);
Route::get('After_Movies',[After_login_controller::class,'After_movies_data']);

Route::get('After_profile',[After_login_controller::class,'profile_data']);
Route::view('Edit','After_login/Edit_profile');

Route::get('Update_profile',[After_login_controller::class,'profile_update']);


Route::view('login_form','login_form');
Route::get('login',[Before_login_Controller::class,'validate_login']);
Route::view('register_form','register_form');
Route::get('register',[Before_login_Controller::class,'validate_form']);

Route::get('pass_validate',[After_login_controller::class,'pass_validate']);
Route::view('change_password','After_login/Change_password');

Route::post('update_profile_pic',[After_login_controller::class,'update_profile_pic']);
