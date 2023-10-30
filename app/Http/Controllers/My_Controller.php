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
use App\Models\contact_msg;
use App\Models\order;
use Illuminate\Support\Facades\Mail;

class My_Controller extends Controller
{
    public function validate_form(request $ob)
    {
        $ob->validate(
            [
                'un' => 'required',
                'em' => 'required',
                'mob' => 'required|numeric|Digits:10',
                'pwd' => 'required|min:8|max:16|confirmed',
                'pwd_confirmation' => 'required',
                'gen' => 'required',
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
                'gen.required' => 'Please select gender.',
            ],
        );

        $user = new register();
        $user->Username = $ob->un;
        $user->Email = $ob->em;
        $user->Password = $ob->pwd;
        $user->Mobile_No = $ob->mob;
        $user->Gender = $ob->gen;
        $user->Profile_Pic = 'Default.png';
        $user->Status = 'Inactive';
        $user->Role = 'User';

        if ($user->save()) {
            $data = ['fn' => $ob->un, 'em' => $ob->em];
            Mail::send(['text' => 'account_created_mail_admin'], ['data' => $data], function ($message) use ($data) {
                $message->to($data['em'], $data['fn']);
                $message->from('abhuj145@rku.ac.in', 'Marvel');
                $message->subject('Activation Link');
            });

            session()->flash('succ', 'Registration Completed Pleace check Your mail for Activation Link');
        } else {
            session()->flash('error', 'Something went Wrong Please try latter');
        }

        // return redirect('login_form');
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function validate_movie(request $ob)
    {
        $ob->validate(
            [
                'mn' => 'required',
                'rd' => 'required',
                'tkt' => 'required',
                'pr' => 'required',
                'movie_pic' => 'required|mimes:jpg,png,gif,bmp', //|size:5120
            ],
            [
                'mn.required' => 'Movie name is required.',
                'tkt.required' => 'No. of ticket is required.',
                'pr.required' => 'Price is required',
                'rd.required' => 'Release date is required.',
                'movie_pic.required' => 'Please select picture.',
            ],
        );

        if ($ob->hasFile('movie_pic')) {
            $file = $ob->file('movie_pic');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('pictures/movies/', $filename);
            // You may want to save the filename to a database or perform other operations here
        }

        $check = movies::insert([
            'Movie_Name' => $ob->mn,
            'Release_Date' => $ob->rd,
            'Status' => $ob->status,
            'available_tickets' => $ob->tkt,
            'Price' => $ob->pr,
            'pic' => $filename,
        ]);
        if ($check) {
            session()->flash('succ', 'Movie added successfully.');
        } else {
            session()->flash('error', 'Failed to add movie');
        }
        return redirect()->action([My_Controller::class, 'fetch_movies']);
    }

    // public function validate_upcom_movie(request $ob)
    // {
    //     $ob->validate(
    //         [
    //             'mn' => 'required',
    //             'rt' => 'required',
    //             'rd' => 'required',
    //             'movie_pic' => 'required|size:5120|mimes:jpg,png,gif,bmp',
    //         ],
    //         [
    //             'mn.required' => 'Movie name is required.',
    //             'rt.required' => 'Run time is required.',
    //             'rd.required' => 'Release date is required.',
    //             'movie_pic.required' => 'Please select picture.',
    //         ],
    //     );
    // }

    public function validate_product(request $ob)
    {
        $ob->validate(
            [
                'pro_name' => 'required',
                'pro_des' => 'required',
                'qty' => 'required|numeric',
                'price' => 'required',
                'pro_pic' => 'required|mimes:jpg,png,gif,bmp', //|size:5120
            ],
            [
                'pro_name.required' => 'Product name is required.',
                'pro_des.required' => 'Product description is required.',
                'qty.required' => 'Product quantity is required.',
                'qty.numeric' => 'Product quantity must be number.',
                'price.required' => 'Product price is required.',
                'pro_pic.required' => 'Please select picture.',
            ],
        );
        if ($ob->hasFile('pro_pic')) {
            $file = $ob->file('pro_pic');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('pictures/products/', $filename);
            // You may want to save the filename to a database or perform other operations here
        }

        $check = products::insert([
            'product_name' => $ob->pro_name,
            'product_desc' => $ob->pro_des,
            'product_image' => $filename,
            'price' => $ob->price,
            'Quantity' => $ob->qty,
        ]);
        if ($check) {
            session()->flash('succ', 'Product added successfully.');
        } else {
            session()->flash('error', 'Failed to add product.');
        }
        return redirect()->action([My_Controller::class, 'fetch_products']);
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
        $admin_data = admin_data::select()->where('Role', 'Admin')->get();
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

    public function fetch_movies_upcom()
    {
        // $movies1 = movies::select()->get();
        $upcomingMovies = movies::where('status', 'Upcoming')->get();
        return view('Admin/movies_upcoming', compact('upcomingMovies'));
    }

    public function fetch_top_movies()
    {
        $movies1 = top_movies_model::select()->get();
        return view('Admin/movies_top', compact('movies1'));
    }

    // Fetching Data End

    public function fetch_detail($email)
    {
        $data = register::where('email', $email)->first();
        return view('Admin/update_account', compact('data'));
    }
    public function delete_acc($email)
    {
        register::where('email', $email)->update(['status' => 'Deleted']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function deactivate_user($email)
    {
        register::where('email', $email)->update(['status' => 'Inactive']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function Activate($email)
    {
        register::where('email', $email)->update(['status' => 'Active']);
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function reactivate_user($email)
    {
        $check = register::where('email', $email)->update(['status' => 'Active']);
        if ($check) {
            session()->flash('succ', 'Reactivated Successfully.');
        } else {
            session()->flash('error', 'Failed to reactivate.');
        }
        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    public function update_acc(Request $ob)
    {
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

        // if ($ob->hasFile('pic')) {
        //     $file = $ob->file('pic');

        //     $filename = uniqid() . '_' . $file->getClientOriginalName();
        //     $ob->pic->move('pictures/users/', $filename);
        // }
        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/users/', $filename);

            $pic_data = register::where('email', $ob->em)->first();

            if ($pic_data['Profile_Pic'] != 'Deafult.png') {
                $previousFilePath = 'pictures/' . $pic_data['Profile_Pic']; // Example path

                if (File::exists($previousFilePath)) {
                    File::delete($previousFilePath);
                }
            }

            register::where('Email', $ob->em)->update([
                'Profile_Pic' => 'users/' . $filename,
            ]);
        }

        register::where('email', $ob->em)->update([
            'Username' => $ob->un,
            'Password' => $ob->pwd,
            'Mobile_No' => $ob->mob,
            'Gender' => $ob->gender,
            'Role' => $ob->role,
        ]);

        return redirect()->action([My_Controller::class, 'fetch_total']);
    }

    // Movies Edit
    public function fetch_movies()
    {
        $movies1 = movies::select()->get();
        return view('Admin/movies', compact('movies1'));
    }

    public function fetch_movie_detail($m_id)
    {
        $movies = movies::where('movie_id', $m_id)->first();
        return view('Admin/update_movie', compact('movies'));
    }

    public function delete_movies($m_id)
    {
        movies::where('movie_id', $m_id)->update(['status' => 'Deleted']);
        return redirect()->action([My_Controller::class, 'fetch_movies']);
    }

    public function update_movie(Request $ob)
    {
        $ob->validate(
            [
                'mn' => 'required',
                'rd' => 'required|',
                'tkt' => 'required|',
                'qty' => 'required',
                'pr' => 'required|',
                'status' => 'required',
                'pic' => 'mimes:jpg,png|max:2048',
            ],
            [
                'mn.required' => 'Movie name is required.',
                'rd.required' => 'Release date is required.',
                'qty.required' => 'Quantity is required.',
                'tkt.required' => 'No. of ticket is required.',
                'pr.required' => 'ticket price is required.',
                'status.required' => 'Status is required.',
                
                'pic.required' => 'Picture is required.',
                'pic.mimes' => 'Picture types must be jpg,png',
                'pic.max' => 'Picture size must be less than 2MB',
            ],
        );

        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/movies/', $filename);

            $pic_data = movies::where('Movie_ID', $ob->m_id)->first();

            $previousFilePath = 'pictures/movies' . $pic_data['pic']; // Example path

            if (File::exists($previousFilePath)) {
                File::delete($previousFilePath);
            }

            movies::where('Movie_ID', $ob->m_id)->update([
                'pic' => $filename,
            ]);
        }

        movies::where('Movie_ID', $ob->m_id)->update([
            'Movie_Name' => $ob->mn,
            'Release_Date' => $ob->rd,
            'available_tickets' => $ob->tkt,
            'Price' => $ob->pr,
            'Status' => $ob->status,
        ]);

        return redirect()->action([My_Controller::class, 'fetch_movies']);
    }

    // Products

    public function fetch_products()
    {
        $products = products::where('deleted', 'No')->get();
        return view('Admin/products', compact('products'));
    }

    public function fetch_product_detail($pro_id)
    {
        $pro = products::where('product_id', $pro_id)->first();
        return view('Admin/update_product', compact('pro'));
    }

    public function update_pro(Request $ob)
    {
        $ob->validate(
            [
                'pn' => 'required',
                'pd' => 'required',
                'p' => 'required',
                'pic' => 'mimes:jpg,png|max:2048',
            ],
            [
                'pn.required' => 'Product name is required.',
                'pd.required' => 'Description is required.',
                'p.required' => 'Price is required.',
                'pic.required' => 'Picture is required.',
                'pic.mimes' => 'Picture types must be jpg,png',
                'pic.max' => 'Picture size must be less than 2MB',
            ],
        );

        if ($ob->hasFile('pic')) {
            $file = $ob->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $ob->pic->move('pictures/products/', $filename);

            $pic_data = products::where('product_id', $ob->pro_id)->first();

            $previousFilePath = 'pictures/products' . $pic_data['product_image']; // Example path

            if (File::exists($previousFilePath)) {
                File::delete($previousFilePath);
            }

            products::where('product_id', $ob->pro_id)->update([
                'product_image' => $filename,
            ]);
        }

        products::where('product_id', $ob->pro_id)->update([
            'product_name' => $ob->pn,
            'product_desc' => $ob->pd,
            'price' => $ob->p,
            'quantity' => $ob->qty,
        ]);

        return redirect()->action([My_Controller::class, 'fetch_products']);
    }
    public function delete_product($pro_id)
    {
        products::where('product_id', $pro_id)->update(['deleted' => 'Yes']);
        return redirect()->action([My_Controller::class, 'fetch_products']);
    }

    //Order
    // public function fetch_order(){
    //     $order = order::all();
    //     $product_detail=products::where('Product_id',$order['Product_id'])->get();
    //     return view('Admin/orders',compact('order','product_detail'));
    // }

    //Review Rating
    public function fetch_review_rating()
    {
        $review = review_rating::where('Deleted', 'No')->get();
        return view('Admin/review_rating', compact('review'));
    }
    public function delete_rating($review_id)
    {
        review_rating::where('Rating_id', $review_id)->update(['deleted' => 'Yes']);
        return redirect()->action([My_Controller::class, 'fetch_review_rating']);
    }

    //Deleted products
    public function fetch_deleted_products()
    {
        $del_product = products::where('deleted', 'Yes')->get();
        return view('Admin/products_deleted', compact('del_product'));
    }

    //Deleted Users
    public function fetch_deleted_users()
    {
        $del_user = register::where('status', 'Deleted')->get();
        return view('Admin/users_deleted', compact('del_user'));
    }

    //Messages
    public function fetch_messages()
    {
        $msgs = contact_msg::where('deleted', 'No')->get();
        return view('Admin/messages', compact('msgs'));
    }
    public function delete_msg($msg_id)
    {
        contact_msg::where('id', $msg_id)->update(['deleted' => 'Yes']);
        return redirect()->action([My_Controller::class, 'fetch_messages']);
    }

    // Logged In Profile
    public function profile_data()
    {
        $user_id = session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('Admin/admin_profile', compact('data'));
    }

    public function profile_update()
    {
        $user_id = session('user_id');

        $data = register::where('id', $user_id)->first();

        return view('Admin/admin_profile_edit', compact('data'));
    }
    // profile update
    public function update_profile1(Request $req)
    {
        $User_id = session('user_id');
        $req->validate([
            'fn' => 'required|min:3|max:15',
            'mob' => 'required|numeric|digits:10',
            'Gender' => 'required',
        ]);

        $check = register::where('id', $User_id)->update([
            'Username' => $req->fn,
            'Mobile_No' => $req->mob,
            'Gender' => $req->Gender,
        ]);
        // if ($check) {
        //     session()->flash('succ', 'Profile Updated Successfuly');
        // } else {
        //     session()->flash('error', 'Something Went Wrong');
        // }
        return redirect()->action([My_Controller::class, 'profile_data']);
    }

    public function admin_profile_delete(Request $req)
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
            session()->flash('error', 'Entered Password is incorrect Enter correct password');
            return redirect()->action([My_Controller::class, 'profile_data']);
        }
        return redirect()->action([My_Controller::class, 'profile_data']);
    }

    // change own password
    public function change_password(Request $req)
    {
        $User_id = session('user_id');
        $data = register::where('id', $User_id)->first();

        if ($data['Password'] == $req->opwd) {
            $check = register::where('id', $User_id)->update([
                'Password' => $req->npwd,
            ]);
            if ($check) {
                session()->flash('succ', 'password changed successfully');
            } else {
                session()->flash('error', 'Something Went Wrong');
            }
        } else {
            session()->flash('error', 'Old Password Does not matched');
        }
        return redirect()->action([My_Controller::class, 'profile_data']);
    }
    // update profile picture validation
    public function update_profile_pic(Request $req)
    {
        $user_id = session('user_id');
        $req->validate(
            [
                'profile_pic' => 'required|mimes:jpg,png,jpeg,webp|max:5120',
            ],
            [
                'profile_pic.required' => 'Picture is required.',
                'profile_pic.mimes' => 'Picture types must be jpg, png, jpeg, or webp',
                'profile_pic.max' => 'Picture size must be less than 5MB',
            ],
        );

        if ($req->hasFile('profile_pic')) {
            $file = $req->file('profile_pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $req->profile_pic->move('pictures/users/', $filename);

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

        return redirect()->action([My_Controller::class, 'profile_data']);
    }

    // public function change_pass()
    // {
    //     $user_id = session('user_id');

    //     $data = register::where('id', $user_id)->first();

    //     return view('After_login/Change_password', compact('data'));
    // }

    // public function delete_acc(Request $req)
    // {
    //     $user_id = session('user_id');
    //     $data = register::where('id', $user_id)->first();

    //     if ($data['Password'] == $req->pwd) {
    //         $check = register::where('id', $user_id)->update([
    //             'Status' => 'Deleted',
    //         ]);
    //         if ($check) {
    //             session()->flash('Active', 'Your Account deleted successfully!');
    //             return view('login_form');
    //         }
    //     } else {
    //         session()->flash('error', 'Entered Password is incorrect Enter correc password');
    //         return redirect()->action([After_login_controller::class, 'profile_data']);
    //     }
    //     return redirect()->action([After_login_controller::class, 'profile_data']);
    // }
}
