<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\form_model;
use Illuminate\Support\Facades\File;

class My_Controller extends Controller
{
    public function display_data()
    {
        $users = new form_model();
        $data = $users::select()->get();
        return view('total_users', ['users' => $data]);
    }
}
