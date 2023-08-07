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
}
