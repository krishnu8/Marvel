<?php

namespace App\Http\Controllers;
use App\Models\carousel;
use Illuminate\Support\Facades\Session;
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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Activate_link;

class Before_login_Controller extends Controller
{
    public function home_data()
    {
        $data = carousel::select()->get();
        $data1 = index_text::select()->get();
        $data2 = about_char::select()->get();
        return view('Before_login/home', compact('data', 'data1', 'data2'));
    }

    public function about_data()
    {
        $data = about_us::select()->get();
        return view('Before_login/About', compact('data'));
    }
    public function contact_data()
    {
        $data = contact_model::select()->get();
        return view('Before_login/Contact_Us', compact('data'));
    }
    public function franchise_data()
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
        return view('Before_login/Franchise', compact('cosplay', 'clothing', 'toy', 'collection', 'accessories'));
    }
    public function gallery_data()
    {
        $data = gallery_model::select()->get();
        return view('Before_login/Gallery', compact('data'));
    }
    public function movies_data()
    {
        $top = top_movies_model::select()->get();
        $current = movies_model::select()
            ->where('Status', 'Current')
            ->get();
        $upcoming = movies_model::select()
            ->where('Status', 'Upcoming')
            ->get();
        return view('Before_login/Movies', compact('current', 'upcoming', 'top'));
    }

    // -------------------------------------------------------------------------------------------
    // registration form
    public function validate_form(request $ob)
    {
        $ob->validate(
            [
                'un' => 'required',
                'em' => 'required|unique:register,email',
                'mob' => 'required|numeric|Digits:10',
                'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'pwd_confirmation' => 'required',
                'gen' => 'required',
            ],
            [
                'un.required' => 'Username is required.',
                'gen.required' => 'Gender Field is required.',
                'em.required' => 'Email is required.',
                'em.unique' => 'Entered Email already Registered',
                'mob.required' => 'Mobile number is required.',
                'mob.length' => 'Mobile number must be of 10 digits only.',
                'pwd.regex' => 'Please choose strong password with atleast 1 Uppercase 1 Lowercase minimum length 8 and a symbol.',
                'pwd_confirmation.required' => 'Confirm Password is required.',
            ],
        );

        $user = new register();
        $user->Username = $ob->un;
        $user->Email = $ob->em;
        $user->Password = $ob->pwd;
        $user->Mobile_No = $ob->mob;
        $user->Gender = $ob->gen;
        $user->Profile_Pic = 'Default.jpg';
        $user->Status = 'Inactive';
        $user->Role = 'User';

        if ($user->save()) {
            $data = ['fn' => $ob->un, 'em' => $ob->em];
            Mail::send(['text' => 'account_created_mail'], ['data' => $data], function ($message) use ($data) {
                $message->to($data['em'], $data['fn']);
                $message->from('abhuj145@rku.ac.in', 'Marvel');
                $message->subject('Activation Link');
            });

            session()->flash('reg', 'Registration Completed Pleace check Your mail for Activation Link');
        } else {
            session()->flash('reg', 'Something went Wrong Please try latter');
        }

        return redirect('login_form');
    }

    public function Activate($email)
    {
        $count = register::where('Email', $email)->count();
        if ($count != 1) {
            session()->flash('Active', 'Your Account is not registered yet');
        } else {
            $check = register::where('Email', $email)->first();
            if ($check['Status'] == 'Active') {
                session()->flash('Active', 'Your Account is already Active');
            } else {
                register::where('Email', $email)->update(['Status' => 'Active']);
                session()->flash('Active', 'Your Account has Been Activated');
            }
        }

        return redirect('login_form');
    }
    // login form
    public function validate_login(Request $req)
    {
        $req->validate(
            [
                'em' => 'required|email',
                'pwd' => 'required',
            ],
            [
                'em.required' => 'Username is required.',
                'pwd.required' => 'Password is required.',
                'em.email' => 'Enter valid Email',
            ],
        );

        $check_login = register::where('Email', $req->em)->first();

        if ($check_login) {
            if ($check_login['Password'] == $req->pwd) {
                if ($check_login['Status'] == 'Active') {
                    session(['user_id' => $check_login['id']]);
                    if ($check_login['User_Type'] == 'Admin') {
                        // navigate to admin dashboard
                    } else {
                        return redirect('After_home');
                    }
                } else {
                    session()->flash('login', 'please Activate your Account');
                }
            } else {
                session()->flash('login', 'Enter valid password');
            }
        } else {
            session()->flash('login', 'Enter Registered Email Address');
        }

        return redirect('login_form');
    }

    public function forget(Request $req)
    {
        $req->validate(
            [
                'em' => 'required|email',
            ],
            [
                'em.required' => 'Enter Email address',
                'em.email' => 'Enter Valid Email Address',
            ],
        );
        $email = $req->em;
        $count = register::where('Email', $email)->count();
        $user = register::where('Email', $email)->first();

        if ($count == 1) {
            Session::put('Forget_password_email',$user->Email);
            $data = ['fn' => $user->un, 'em' => $req->em];
            Mail::send(['text' => 'forget_password_mail'], ['data' => $data], function ($message) use ($data) {
                $message->to($data['em'], $data['fn']);
                $message->from('abhuj145@rku.ac.in', 'Marvel');
                $message->subject('Forget Password Link');
            });

            session()->flash('forget', 'Please check your mail for the password change page');
        } else {
            session()->flash('forget', 'Please Enter Registered email');
        }
        return view('forget_password');
    }

    // change password forget password
    public function change_password()
    {
        $email = session('Forget_password_email');
        // echo "hello";
        echo $email;
    }
}
