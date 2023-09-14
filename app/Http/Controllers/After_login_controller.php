<?php

namespace App\Http\Controllers;
use App\Models\carousel;
use Illuminate\Http\Request;
use App\Models\index_text;
use App\Models\contact_model;
use App\Models\gallery_model;
use App\Models\movies_model;
use App\Models\top_movies_model;
use App\Models\franchise_model;
use App\Models\about_char;
use App\Models\about_us;
use App\Models\register;


class After_login_controller extends Controller
{
    public function After_home_data()
    {
        $data = carousel::select()->get();
        $data1 = index_text::select()->get();
        $data2 = about_char::select()->get();
        return view('After_login/home', compact('data', 'data1', 'data2'));
    }

    public function After_about_data()
    {
        $data = about_us::select()->get();
        return view('After_login/About', compact('data'));
    }
    public function After_contact_data()
    {
        $data = contact_model::select()->get();
        return view('After_login/Contact_Us', compact('data'));
    }
    public function After_franchise_data()
    {
        $cosplay = franchise_model::select()
            ->where('Category', 'cosplay')
            ->get();
        $clothing = franchise_model::select()
            ->where('Category', 'clothing')
            ->get();
        $toy = franchise_model::select()
            ->where('Category', 'Toy')
            ->get();
        $collection = franchise_model::select()
            ->where('Category', 'collection')
            ->get();
        $accessories = franchise_model::select()
            ->where('Category', 'accessories')
            ->get();
        return view('After_login/Franchise', compact('cosplay', 'clothing', 'toy', 'collection', 'accessories'));
    }
    public function After_gallery_data()
    {
        $data = gallery_model::select()->get();
        return view('After_login/Gallery', compact('data'));
    }
    public function After_movies_data()
    {
        $top = top_movies_model::select()->get();
        $current = movies_model::select()
            ->where('Status', 'Current')
            ->get();
        $upcoming = movies_model::select()
            ->where('Status', 'Upcoming')
            ->get();
        return view('After_login/Movies', compact('current', 'upcoming', 'top'));
    }
// change password validation
    public function pass_validate(Request $req)
    {
        $req->validate(
            [
                'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'cpwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'ccpwd' => 'same:cpwd',
            ],
            [
                'pwd.required' => 'Password is required.',
                'pwd.regex' => 'Incorrect password',
                'cpwd.required' => 'New Password is required.',
                'cpwd.regex' => 'Password must contain atleast 1:Uppercase,1:lowercase,min:8,symbol:1',
                'ccpwd.same' => 'confirm password must be same as new password',
            ],
        );
        return view('After_login/Change_password');
    }
    // profile data
    public function profile_data(){
        $user_id=session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('After_login/Profile',compact('data'));
    }
    
    // update profile picture validation
    public function update_profile_pic(Request $req)
    {
        $req->validate(
            [
                'pic' => 'required|mimes:jpg,png|max:2048',
            ],
            [
                'pic.required' => 'picture is required.',
                'pic.mimes' => 'Picture types must be jpg,png',
                'pic.max' => 'Picture size must be less than 2MB',
            ],
        );

        return view('After_login/Profile');
    }

    public function profile_update(Request $req)
    {
        $req->validate([
            'Name' => 'required|min:3|max:15',
            'Number' => 'required|numeric|digits:10',
            'Email' => 'required|email',
            'Gender' => 'required',
        ]);
        return view('After_login/Profile');
    }

    public function change_password(Request $req)
    {
        $req->validate([
            'cpwd' => 'required|min:10|max:16|confirmed',
            'ccpwd_confirmation' => 'required',
        ]);
    }
}
