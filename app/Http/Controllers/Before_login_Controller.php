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
use App\Models\registration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;



use Illuminate\Support\Facades\File;

class Before_login_Controller extends Controller
{
    public function home_data(){
        $data = carousel::select()->get();
        $data1 = index_text::select()->get();
        $data2 = about_char::select()->get();
        return view('Before_login/home', compact('data','data1','data2'));
    }

    public function about_data(){
        $data = about_us::select()->get();
        return view('Before_login/About', compact('data'));
    }
    public function contact_data(){
        $data = contact_model::select()->get();
        return view('Before_login/Contact_Us', compact('data'));
    }
    public function franchise_data(){
        $cosplay = franchise_model::select()->where('Category','cosplay')->get();
        $clothing = franchise_model::select()->where('Category','clothing')->get();
        $toy = franchise_model::select()->where('Category','Toy')->get();
        $collection = franchise_model::select()->where('Category','collection')->get();
        $accessories = franchise_model::select()->where('Category','accessories')->get();
        return view('Before_login/Franchise', compact('cosplay','clothing','toy','collection','accessories'));
    }
    public function gallery_data(){
        $data = gallery_model::select()->get();
        return view('Before_login/Gallery', compact('data'));
    }
    public function movies_data(){
        $top = top_movies_model::select()->get();
        $current = movies_model::select()->where('Status','Current')->get();
        $upcoming = movies_model::select()->where('Status','Upcoming')->get();
        return view('Before_login/Movies', compact('current','upcoming','top'));
    }


    // -------------------------------------------------------------------------------------------

    public function validate_form(request $req)
    {
        $req->validate([
            'un' => 'required',
            'em' => 'required|regex:/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/',
            'mob' => 'required|numeric|Digits:10',
            'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'pwd_confirmation' => 'required',
            'gen' => 'required'
        ],[
            'un.required' => 'Username is required.',
            'em.required' => 'Email is required.',
            'em.regex'=>'Enter valid Email',
            'mob.required' => 'Mobile number is required.',
            'mob.length' => 'Mobile number must be of 10 digits only.',
            'pwd.regex'=>'Please choose strong password with atleast 1 Uppercase 1 Lowercase minimum length 8 and a symbol.',
            'pwd_confirmation.required' => 'Confirm Password is required.',
            'gen.required'=>'Please select Gender or We will suppose u r gay'
        ]);

        DB::table('registration')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Username' => $req->un,
            'Email' => $req->em,
            'Number' => $req->mob,
            'Password' => $req->pwd,
            'Gender' => $req->gen
        ]);

        

        return redirect('login_form');

    }

    public function validate_login(Request $req){
        $req->validate([
            'em' => 'required|regex:/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/',
            'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
        ],[
            'em.required' => 'Username is required.',
            'pwd.required' =>'Password is required.',
            'em.regex'=>'Enter valid Email',
            'pwd.regex'=>'Please choose strong password with atleast 1 Uppercase 1 Lowercase minimum length 8 and a symbol.'
        ]);
        return redirect('After_home');

    }
    // ---------------------------------------------------------------------------------------------
    public function pass_validate(Request $req){
        $req->validate([
            'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'cpwd'=>'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'ccpwd'=>'same:cpwd'
        ],[
            'pwd.required' =>'Password is required.',
            'pwd.regex'=>'Incorrect password',
            'cpwd.required' =>'New Password is required.',
            'cpwd.regex'=>'Password must contain atleast 1:Uppercase,1:lowercase,min:8,symbol:1',
            'ccpwd.same' => 'confirm password must be same as new password'
        ]);
        return view('After_login/Change_password');
    }

    public function update_profile_pic(Request $req){
        $req->validate([
        'pic'=>'required|mimes:jpg,png|max:2048'
    ],[
            'pic.required' =>'picture is required.',
            'pic.mimes'=>'Picture types must be jpg,png',
            'pic.max' =>'Picture size must be less than 2MB'
        ]);

    return view('After_login/Profile');
    }
}
