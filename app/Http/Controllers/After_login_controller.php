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
use App\Models\order;
use App\Models\register;
use Illuminate\Support\Facades\File;

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
    public function charData($char)
    {
        $data = about_char::select()
            ->where('Character_Name', $char)
            ->first();
        return view('After_login/charProfile', compact('data'));
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
        $User_id = session('user_id');
        $data = register::where('id', $User_id)->first();
        if ($data['Password'] == $req->pwd) {
            $req->validate(
                [
                    'cpwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                    'ccpwd' => 'same:cpwd',
                ],
                [
                    'cpwd.required' => 'New Password is required.',
                    'cpwd.regex' => 'Password must contain atleast 1:Uppercase,1:lowercase,min:8,symbol:1',
                    'ccpwd.same' => 'confirm password must be same as new password',
                ],
            );

            $check = register::where('id', $User_id)->update([
                'Password' => $req->cpwd,
            ]);

            if ($check) {
                session()->flash('succ', 'password changed successfully');
            } else {
                session()->flash('error', 'Something Went Wrong');
            }
        } else {
            session()->flash('error', 'Enter Correct Curent Password');
            return redirect()->action([After_login_controller::class, 'change_pass']);
        }
        return redirect()->action([After_login_controller::class, 'profile_data']);
    }

    // profile data
    public function profile_data()
    {
        $user_id = session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('After_login/Profile', compact('data'));
    }

    public function Edit_data()
    {
        $user_id = session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('After_login/Edit_profile', compact('data'));
    }

    // update profile picture validation
    public function update_profile_pic(Request $req)
    {
        $user_id = session('user_id');
        $req->validate(
            [
                'pic' => 'required|mimes:jpg,png,jpeg,webp|max:5120',
            ],
            [
                'pic.required' => 'Picture is required.',
                'pic.mimes' => 'Picture types must be jpg, png, jpeg, or webp',
                'pic.max' => 'Picture size must be less than 5MB',
            ],
        );

        if ($req->hasFile('pic')) {
            $file = $req->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $req->pic->move('pictures/users/', $filename);

            $pic_data = register::where('id', $user_id)->first();

            if ($pic_data['Profile_Pic'] != 'Deafult.png') {
                $previousFilePath = 'pictures/' . $pic_data['Profile_Pic']; // Example path

                if (File::exists($previousFilePath)) {
                    File::delete($previousFilePath);
                }
            }

            register::where('id', $pic_data['id'])->update([
                'Profile_Pic' => 'users/' . $filename,
            ]);
            session()->flash('succ', 'Profile picture updated successfully.');
        }

        return redirect()->action([After_login_controller::class, 'profile_data']);
    }

    // profile update
    public function profile_update(Request $req)
    {
        $User_id = session('user_id');
        $req->validate([
            'Name' => 'required|min:3|max:15',
            'Number' => 'required|numeric|digits:10',
            'Email' => 'required|email',
            'Gender' => 'required',
        ]);

        $check = register::where('id', $User_id)->update([
            'Username' => $req->Name,
            'Email' => $req->Email,
            'Mobile_No' => $req->Number,
            'Gender' => $req->Gender,
            'Bio' => $req->bio,
        ]);
        if ($check) {
            session()->flash('succ', 'Profile Updated Successfuly');
        } else {
            session()->flash('error', 'Something Went Wrong');
        }
        return redirect()->action([After_login_controller::class, 'profile_data']);
    }

    public function change_pass()
    {
        $user_id = session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('After_login/Change_password', compact('data'));
    }

    public function delete_acc(Request $req)
    {
        $user_id = session('user_id');
        $data = register::where('id', $user_id)->first();

        if ($data['Password'] == $req->pwd) {
            $check = register::where('id', $user_id)->update([
                'Status' => 'Deleted',
            ]);
            if ($check) {
                session()->flash('Active', 'Your Account deleted successfully!');
                return view('login_form');
            }
        } else {
            session()->flash('error', 'Entered Password is incorrect Enter correc password');
            return redirect()->action([After_login_controller::class, 'profile_data']);
        }
        return redirect()->action([After_login_controller::class, 'profile_data']);
    }

    public function product_detail($id)
    {
        // echo $id;
        $data = franchise_model::where('Product_id', $id)->first();

        $suggestion = franchise_model::where('Category', $data['Category'])
            ->get()
            ->take(4);

        return view('After_login/product_detail', compact('data', 'suggestion'));
        // return view('After_login/product_detail',compact('data'));
    }

    // buy product

    public function Buy_product($id, $qt)
    {
        $User_id = session('user_id');
        $product = franchise_model::where('Product_id', $id)->first();
        if ($product) {
            if ($product['Quantity'] >= 0) {
                order::insert([
                    'Product_id' => $id,
                    'User_id' => $User_id,
                    'Quantity' => $qt,
                    'Price' => $product['Price'],
                    'Discount_Amount' => '0',
                    'Delivery_status' => 'Pending',
                ]);
                franchise_model::where('Product_id', $id)->update([
                    'Quantity' =>$product['Quantity']-$qt,
                ]);
                session()->flash('succ', 'Product Ordered Successfully');
            } else {
                session()->flash('error', 'Product is out of Stock, please wait till the new stock of this product arrive');
            }
        } else {
            return redirect('After_Franchise');
        }
        return redirect('After_Franchise');
    }
}
