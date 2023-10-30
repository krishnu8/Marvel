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
Route::middleware('Admin')->group(function () {
    Route::view('admin_dashboard', 'Admin/dashboard'); //Dashboard
    Route::view('user_add', 'Admin/user_add');
    Route::get('users_total', [My_Controller::class, 'fetch_total']);
    Route::get('users_normal', [My_Controller::class, 'fetch_normal']);
    Route::get('users_admin', [My_Controller::class, 'fetch_admin']);

    Route::get('admin_profile', [My_Controller::class, 'profile_data']);
    // Route::view('admin_profile_edit','Admin/admin_profile_edit');
    Route::get('admin_profile_edit', [My_Controller::class, 'profile_update']);
    Route::post('update_profile', [My_Controller::class, 'update_profile1']);
    Route::post('admin_profile_delete', [My_Controller::class, 'admin_profile_delete']);
    Route::post('change_password', [My_Controller::class, 'change_password']);

    Route::post('update_pro_pic', [My_Controller::class, 'update_profile_pic']);

    Route::get('update_account1/{email}', [My_Controller::class, 'fetch_detail']); //'Admin/update_account'
    Route::post('update_acc', [My_controller::class, 'update_acc']);
    Route::get('delete_account/{email}', [My_Controller::class, 'delete_acc']);
    Route::get('deactivate_user/{email}', [My_Controller::class, 'deactivate_user']);

    Route::get('reactivate_user/{email}', [My_Controller::class, 'reactivate_user']);
    Route::get('activate_user/{email}', [My_Controller::class, 'Activate']);

    Route::get('movies', [My_Controller::class, 'fetch_movies']);
    Route::view('movie_add', 'Admin/movie_add');

    Route::get('update_movie1/{m_id}', [My_Controller::class, 'fetch_movie_detail']); //delete_movies
    Route::post('update_movie', [My_controller::class, 'update_movie']);
    Route::get('delete_movies1/{m_id}', [My_Controller::class, 'delete_movies']);

    Route::get('movies_upcoming', [My_Controller::class, 'fetch_movies_upcom']);
    Route::view('movies_add_upcom', 'Admin/movies_add_upcom');

    Route::get('movies_top', [My_Controller::class, 'fetch_top_movies']);
    Route::view('movies_add_top', 'Admin/movies_add_top');

    Route::get('products', [My_Controller::class, 'fetch_products']);
    Route::view('products_add', 'Admin/products_add');
    //Coupon
    Route::get('coupon', [My_Controller::class, 'fetch_coupon']);
    Route::view('addCoupon', 'Admin/addCoupon');
    Route::get('delete_coupon/{pro_id}', [My_Controller::class, 'delete_coupon']);
    Route::post('add_coupon', [My_controller::class, 'validate_coupon']);

    Route::get('update_product1/{pro_id}', [My_Controller::class, 'fetch_product_detail']);
    Route::post('update_pro', [My_controller::class, 'update_pro']);
    Route::get('delete_product1/{pro_id}', [My_Controller::class, 'delete_product']);

    // Route::view('orders', 'Admin/orders');
    Route::get('orders', [My_Controller::class, 'fetch_order']);
    Route::view('order_add', 'Admin/order_add');

    Route::get('review_rating', [My_Controller::class, 'fetch_review_rating']);
    Route::get('delete_rating1/{review_id}', [My_Controller::class, 'delete_rating']);

    Route::get('products_deleted', [My_Controller::class, 'fetch_deleted_products']);

    Route::get('users_deleted', [My_Controller::class, 'fetch_deleted_users']);

    Route::get('messages', [My_Controller::class, 'fetch_messages']);
    Route::get('delete_msg1/{msg_id}', [My_Controller::class, 'delete_msg']);

    Route::post('form_controller', [My_controller::class, 'validate_form']);

    Route::post('movie_controller', [My_controller::class, 'validate_movie']);

    Route::post('upcom_movie_controller', [My_controller::class, 'validate_upcom_movie']);
    Route::post('top_movie_controller', [My_controller::class, 'validate_top_movie']);

    Route::post('product_controller', [My_controller::class, 'validate_product']);

    Route::post('order_controller_route', [My_controller::class, 'place_order']);
    Route::get('complete_ord1/{ord_id}', [My_Controller::class, 'complete_ord']);
    Route::get('cancel_ord1/{ord_id}/{qty}/{pid}', [My_Controller::class, 'cancel_ord']);
    Route::get('delete_ord1/{ord_id}', [My_Controller::class, 'delete_ord']);
    Route::get('reorder1/{ord_id}/{qty}/{pid}', [My_Controller::class, 'reorder']);

    //Tickets
    Route::get('tickets', [My_Controller::class, 'fetch_ticket']);
    Route::get('delete_ticket1/{tkt_id}', [My_Controller::class, 'del_tkt']);


});
// Admin End



//Before login---------------------------------------------------------------------------------------------
Route::middleware('non_login')->group(function () {
    Route::get('home', [Before_login_Controller::class, 'home_data']);
    // Route::get('fetch',[Before_login_Controller::class,'fetch_data']);
    Route::get('About_Us', [Before_login_Controller::class, 'about_data']);
    // Route::get('/delete/{email}',[sample_controller::class,'delete_data']);
    Route::get('Contact_Us', [Before_login_Controller::class, 'contact_data']);
    Route::get('Gallery', [Before_login_Controller::class, 'gallery_data']);
    Route::get('Franchise', [Before_login_Controller::class, 'franchise_data']);
    Route::get('Movies', [Before_login_Controller::class, 'movies_data']);
    Route::get('charProfile/{char}', [Before_login_Controller::class, 'charData']);
    // Route::view('Login','Before_login/login_form');

    // activate register account

    Route::get('account_activation/{email}', [Before_login_Controller::class, 'Activate']);

    Route::view('forget', 'forget_password');
    Route::get('forget_pass', [Before_login_Controller::class, 'forget']);

    Route::view('otp_form', 'otp_form');
    Route::get('check_otp', [Before_login_Controller::class, 'check_otp']);

    // Route::view('forget_change_pass/{email}', 'change_pass');
    Route::view('forget_change_pass/{email}', 'change_pass')->name('change_password');

    Route::get('change_forget_password', [Before_login_Controller::class, 'change_password']);

    Route::view('login_form', 'login_form');
    Route::get('login', [Before_login_Controller::class, 'validate_login']);
    Route::view('register_form', 'register_form');
    Route::get('register', [Before_login_Controller::class, 'validate_form']);
});

Route::get('logout', [Before_login_Controller::class, 'logout']);


//After login---------------------------------------------------------------------------------------------
Route::middleware('user')->group(function () {
    Route::get('After_home', [After_login_controller::class, 'After_home_data']);
    Route::get('After_About_Us', [After_login_controller::class, 'After_about_data']);
    Route::get('After_Contact_Us', [After_login_controller::class, 'After_contact_data']);
    Route::get('After_Gallery', [After_login_controller::class, 'After_gallery_data']);
    Route::get('After_Franchise', [After_login_controller::class, 'After_franchise_data']);
    Route::get('After_Movies', [After_login_controller::class, 'After_movies_data']);

    Route::get('After_profile', [After_login_controller::class, 'profile_data']);
    Route::get('Edit', [After_login_controller::class, 'Edit_data']);

    Route::get('Update_profile', [After_login_controller::class, 'profile_update']);

    Route::get('pass_validate', [After_login_controller::class, 'pass_validate']);
    Route::get('change_password', [After_login_controller::class, 'change_pass']);

    // Route::view('change_password','After_login/Change_password');
    Route::get('delete', [After_login_controller::class, 'delete_acc']);

    Route::post('update_profile_pic', [After_login_controller::class, 'update_profile_pic']);
    Route::get('after_charProfile/{char}',[After_login_Controller::class, 'charData']);

    // Route::view('product_detail', 'After_login/product_detail');
    Route::get('product_detail/{char}',[After_login_Controller::class, 'product_detail']);



    // buy product
    Route::get('Buy_product/{id}/{qt}',[After_login_Controller::class, 'Buy_product']);

    // Route::view('order_list','After_login/order_list');
    Route::get('order_list',[After_login_Controller::class, 'order_list']);
    Route::get('Cancle_order/{id}',[After_login_Controller::class, 'cancle_order']);


    //Add to cart
    Route::get('add_to_cart/{id}/{qt}',[After_login_Controller::class, 'cart']);
    Route::get('cart_list',[After_login_Controller::class, 'cart_list']);
    Route::get('remove/{id}',[After_login_Controller::class, 'remove_from_cart']);
    Route::get('place_cart_order',[After_login_Controller::class, 'place_cart_order']);
    //Book Ticket
    Route::post('Book_Ticket',[After_login_Controller::class, 'Book_Ticket']);

    // Route::view('ticket_list','ticket_list');
    Route::get('ticket_list',[After_login_Controller::class, 'Ticket_list']);
    Route::get('remove_ticket/{id}',[After_login_Controller::class, 'remove_ticket']);




    // search funcanality

    Route::post('search_franchise',[After_login_Controller::class, 'search_franchise']);
    // Route::view('search_franchise','search_franchise');


    // review rating
    Route::post('review_rating',[After_login_Controller::class, 'review_rating']);
    //Offers
    Route::get('apply_coupon/{id}/{coupon}',[After_login_Controller::class, 'validate_coupon']);
    Route::get('product_detail_after_discount/{char}',[After_login_Controller::class, 'product_detail_after_discount']);
});
