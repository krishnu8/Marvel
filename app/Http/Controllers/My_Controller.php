<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin\admin_data;
use App\Models\Admin\normal_user_data;
use App\Models\Admin\total_user_data;
use App\Models\Admin\movies;
use App\Models\Admin\products;
use App\Models\Admin\review_rating;
use App\Models\register;
use App\Models\top_movies_model;

class My_Controller extends Controller
{
    public function validate_form(request $ob)
    {
        $ob->validate(
            [
                'un' => 'required',
                'em' => 'required',
                'mob' => 'required|numeric|Digits:10',
                'pwd' => 'required|min:10|max:16|confirmed',
                'pwd_confirmation' => 'required',
            ],
            [
                'un.required' => 'Username is required.',
                'em.required' => 'Email is required.',
                'mob.required' => 'Mobile number is required.',
                'mob.Digits' => 'Mobile number must be of 10 digits only.',
                'pwd.required' => 'Password is required.',
                'pwd.min' => 'Minimum Digits must be of 8 characters.',
                'pwd.max' => 'Maximum Digits must be of 16 characters.',
                'pwd_confirmation.required' => 'Confirm Password is required.',
            ],
        );
        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/users/', $filename);
            // $pic_data = register::where('email', $ob->em)->first();

            // if ($pic_data['Picture'] != 'Deafult.png') {
            //     $previousFilePath = 'pictures/' . $pic_data['Picture']; // Example path

            //     if (File::exists($previousFilePath)) {
            //         File::delete($previousFilePath);
            //     }
            // }
        }

        register::where('email', $ob->em)->update([
            'Username'=>$ob->un,
            'Password'=>$ob->pwd,
            'Mobile_No'=>$ob->mob,
            'Gender'=>$ob->gender,
            'Profile_Pic'=>$ob->pic,
            'Role'=>$ob->role,
        ]);

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
                'pwd.min' => 'Minimum Digits must be of 8 characters.',
                'pwd.max' => 'Maximum Digits must be of 16 characters.',
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
                'number' => 'required|numeric|Digits:10',
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
            ->where('Role', 'Admin')
            ->get();
        return view('Admin/users_admin', compact('admin_data'));
    }

    public function fetch_normal()
    {
        $norm_user_data = normal_user_data::select()
            ->where('Role', 'User')
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

    public function fetch_movies_upcom(){
        // $movies1 = movies::select()->get();
        $upcomingMovies = movies::where('status', 'Upcoming')->get();
        return view('Admin/movies_upcoming', compact('upcomingMovies'));
    }

    public function fetch_top_movies(){
        $movies1 = top_movies_model::select()->get();
        return view('Admin/movies_top', compact('movies1'));
    }

    // Fetching Data End

    public function fetch_detail($email){
        $data = register::where('email', $email)->first();
        return view('Admin/update_account',compact('data'));
    }
    public function delete_acc($email){
        register::where('email', $email)->update(['status' => 'Deleted']);
        return redirect()->action([My_Controller::class, 'fetch_total']);

    }

    public function deactivate_user($email){
        register::where('email', $email)->update(['status' => 'Inactive']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function Activate($email){
        register::where('email', $email)->update(['status' => 'Active']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function reactivate_user($email){
        register::where('email', $email)->update(['status' => 'Active']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function update_acc(Request $ob){
        $ob->validate(
            [
                'un' => 'required',
                'mob' => 'required|numeric|Digits:10',
                'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'pwd_confirmation' => 'required',
                'gender' => 'required',
                'pic' => 'mimes:jpg,png|max:2048',

            ],
            [
                'un.required' => 'Username is required.',
                'gender.required' => 'Gender Field is required.',
                'mob.required' => 'Mobile number is required.',
                'mob.length' => 'Mobile number must be of 10 digits only.',
                'pwd.regex' => 'Please choose strong password with atleast 1 Uppercase 1 Lowercase minimum length 8 and a symbol.',
                'pwd_confirmation.required' => 'Confirm Password is required.',
                'pic.required' => 'picture is required.',
                'pic.mimes' => 'Picture types must be jpg,png',
                'pic.max' => 'Picture size must be less than 2MB',
            ],
        );

        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/users/', $filename);
        }

        register::where('email', $ob->em)->update([
            'Username'=>$ob->un,
            'Password'=>$ob->pwd,
            'Mobile_No'=>$ob->mob,
            'Gender'=>$ob->gender,
            'Profile_Pic'=>$ob->pic,
            'Role'=>$ob->role,
        ]);

        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    // Movies Edit
    public function fetch_movie_detail($m_id){
        $movies = movies::where('movie_id', $m_id)->first();
        return view('Admin/update_movie',compact('movies'));
    }

    public function delete_movies($m_id){
        movies::where('movie_id', $m_id)->update(['status' => 'Deleted']);
        return redirect()->action([My_Controller::class, 'fetch_movies']);

    }

    public function update_movie(Request $ob){
        $ob->validate(
            [
                'mn' => 'required',
                'rt' => 'required',
                'rd' => 'required|',
                'status' => 'required',
                'pic' => 'mimes:jpg,png|max:2048',

            ],
            [
                'mn.required' => 'Movie name is required.',
                'rt.required' => 'runtime is required.',
                'rd.required' => 'Release date is required.',
                'status.required' => 'Status is required.',
                'pic.required' => 'Picture is required.',
                'pic.mimes' => 'Picture types must be jpg,png',
                'pic.max' => 'Picture size must be less than 2MB',
            ],
        );

        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/users/', $filename);
        }

        register::where('email', $ob->em)->update([
            'Movie_Name	'=>$ob->mn,
            'Run_Time'=>$ob->rt,
            'Release_Date'=>$ob->rd,
            'Status'=>$ob->status,
            'pic'=>$ob->pic,
        ]);

        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    // Products

    public function fetch_products(){
        $products = products::select()->get();
        return view('Admin/products', compact('products'));
    }

    public function fetch_review_rating(){
        $review = review_rating::select()->get();
        return view('Admin/review_rating', compact('review'));
    }
}
