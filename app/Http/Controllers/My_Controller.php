<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin\admin_data;
use App\Models\Admin\normal_user_data;
use App\Models\Admin\total_user_data;
use App\Models\Admin\movies;

class My_Controller extends Controller
{
    public function validate_form(request $ob)
    {
        $ob->validate(
            [
                'un' => 'required',
                'em' => 'required',
                'mob' => 'required|numeric|length:10',
                'pwd' => 'required|min:10|max:16|confirmed',
                'pwd_confirmation' => 'required',
            ],
            [
                'un.required' => 'Username is required.',
                'em.required' => 'Email is required.',
                'mob.required' => 'Mobile number is required.',
                'mob.length' => 'Mobile number must be of 10 digits only.',
                'pwd.required' => 'Password is required.',
                'pwd.min' => 'Minimum length must be of 8 characters.',
                'pwd.max' => 'Maximum length must be of 16 characters.',
                'pwd_confirmation.required' => 'Confirm Password is required.',
            ],
        );
    }

    public function validate_login(Request $req)
    {
        $req->validate(
            [
                'em' => 'required',
                'pwd' => 'required|min:10|max:16',
            ],
            [
                'em.required' => 'Username is required.',
                'pwd.required' => 'Password is required.',
                'pwd.min' => 'Minimum length must be of 8 characters.',
                'pwd.max' => 'Maximum length must be of 16 characters.',
            ],
        );
    }

    public function validate_movie(request $ob)
    {
        $ob->validate(
            [
                'mn' => 'required',
                'rt' => 'required',
                'rd' => 'required',
                'movie_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
            ],
            [
                'mn.required' => 'Movie name is required.',
                'rt.required' => 'Run time is required.',
                'rd.required' => 'Release date is required.',
                'movie_pic.required' => 'Please select picture.',
            ],
        );
    }

    public function validate_upcom_movie(request $ob)
    {
        $ob->validate(
            [
                'mn' => 'required',
                'rt' => 'required',
                'rd' => 'required',
                'movie_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
            ],
            [
                'mn.required' => 'Movie name is required.',
                'rt.required' => 'Run time is required.',
                'rd.required' => 'Release date is required.',
                'movie_pic.required' => 'Please select picture.',
            ],
        );
    }

    public function validate_top_movie(request $ob)
    {
        $ob->validate(
            [
                'mn' => 'required',
                'rt' => 'required',
                'rd' => 'required',
                'movie_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
            ],
            [
                'mn.required' => 'Movie name is required.',
                'rt.required' => 'Run time is required.',
                'rd.required' => 'Release date is required.',
                'movie_pic.required' => 'Please select picture.',
            ],
        );
    }

    public function validate_product(request $ob)
    {
        $ob->validate(
            [
                'pro_name' => 'required',
                'pro_des' => 'required',
                'qty' => 'required|numeric',
                'cat' => 'required',
                'pro_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
            ],
            [
                'pro_name.required' => 'Product name is required.',
                'pro_des.required' => 'Product description is required.',
                'qty.required' => 'Product quantity is required.',
                'qty.numeric' => 'Product quantity must be number.',
                'cat.required' => 'Product category is required.',
                'pro_pic.required' => 'Please select picture.',
            ],
        );
    }

    public function validate_order(request $ob)
    {
        $ob->validate(
            [
                'name' => 'required',
                'number' => 'required|numeric|length:10',
                'qty' => 'required|numeric',
                'cat' => 'required',
                'pro_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
            ],
            [
                'pro_name.required' => 'Product name is required.',
                'pro_des.required' => 'Product description is required.',
                'qty.required' => 'Product quantity is required.',
                'qty.numeric' => 'Product quantity must be number.',
                'cat.required' => 'Product category is required.',
                'pro_pic.required' => 'Please select picture.',
            ],
        );
    }

    // Fetching Data Start

    public function fetch_admin()
    {
        $admin_data = admin_data::select()
            ->where('user_type', 'admin')
            ->get();
        return view('Admin/users_admin', compact('admin_data'));
    }

    public function fetch_normal()
    {
        $norm_user_data = normal_user_data::select()
            ->where('user_type', 'normal')
            ->get();
        return view('Admin/users_normal', compact('norm_user_data'));
    }

    public function fetch_total()
    {
        $total_user_data = total_user_data::select()->get();
        return view('Admin/users_total', compact('total_user_data'));
    }

    public function fetch_movies(){
        $movies1 = movies::select()->get();
        return view('Admin/movies', compact('movies1'));
    }

    // Fetching Data End
}
