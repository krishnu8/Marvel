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
use Carbon\Carbon;
use App\Models\order;
use App\Models\cart;
use App\Models\Admin\review_rating;
use App\Models\offers;
use App\Models\register;
use App\Models\ticket_book;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

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
            ->where('Status', 'Available')
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

        $feedback=review_rating::where('Product_id',$id)->get();

        return view('After_login/product_detail', compact('data', 'suggestion','feedback'));
        // return view('After_login/product_detail',compact('data'));
    }

    // funcanality
    // buy product

    public function Buy_product($id, $qt)
    {
        $User_id = session('user_id');
        $product = franchise_model::where('Product_id', $id)->first();
        if ($product) {
            if ($product['Quantity'] >= 0) {
                if(session('Discount_Amt')){
                    $discount = session('Discount_Amt');
                    session()->forget('Discount_Amt');
                }else{
                    $discount = 0;
                }
                if(session('Coupon_Status')){
                    $coupon = session('Coupon_Status');
                    $offer = offers::where('Coupon', $coupon)->first();
                    if ($offer) {
                    $offer->update(['Status' => 'Used']);
                    }
                }
                order::insert([
                    'Product_id' => $id,
                    'User_id' => $User_id,
                    'Quantity' => $qt,
                    'Price' => $product['Price'],
                    'Discount_Amount' => $discount,
                    'Delivery_status' => 'Pending',
                ]);
                franchise_model::where('Product_id', $id)->update([
                    'Quantity' => $product['Quantity'] - $qt,
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

    public function order_list()
    {
        $User_id = session('user_id');
        $order = order::where('User_id', $User_id)->orderBy('Order_id', 'desc')->get();

        $Product_id = [];
        foreach ($order as $order1) {
            $Product_id[] = $order1['Product_id'];
        }

        $product_detail = franchise_model::whereIn('Product_id', $Product_id)->get();

        return view('After_login/order_list', compact('order', 'product_detail'));
    }

    public function cancle_order($id)
    {

        $order = order::where('Order_id', $id)->first();
        $qt = $order['Quantity'];
        $product = franchise_model::where('Product_id',$order['Product_id']);
        $franchise = franchise_model::where('Product_id', $order['Product_id'])->first();

        if ($franchise) {
            $franchise->update([
            'Quantity' => $franchise->Quantity + $qt,
            ]);
        }
        $check = order::where('Order_id', $id)->delete();
        return redirect('order_list');
    }

    public function cart($id, $qt)
    {
        $User_id = session('user_id');
        $product = franchise_model::where('Product_id', $id)->first();
        if ($product) {
            if ($product['Quantity'] >= 0) {
                if(session('Discount_Amt')){
                    $discount = session('Discount_Amt');
                    session()->forget('Discount_Amt');
                }else{
                    $discount = 0;
                }
                if(session('Coupon_ID')){
                    $offer = offers::where('Offer_ID', session('Coupon_ID'))->first();
                    if ($offer) {
                    $offer->update(['Status' => 'Used']);
                    }
                }
                cart::insert([
                    'Product_id' => $id,
                    'User_id' => $User_id,
                    'Quantity' => $qt,
                    'Price' => $product['Price'],
                    'Discount_Amount' => $discount,
                ]);

                 session()->flash('succ', 'Product Successfully Added to Cart');
            } else {
                session()->flash('error', 'Product is out of Stock, please wait till the new stock of this product arrive');
            }
        } else {
            return redirect('After_Franchise');
        }
        return redirect('After_Franchise');
    }
    public function cart_list()
    {
        $User_id = session('user_id');
        // $cart = cart::where('User_id', $User_id)->get();
        $cart = cart::where('User_id', $User_id)->orderBy('cart_id', 'desc')->get();

        $Product_id = [];
        foreach ($cart as $cart1) {
            $Product_id[] = $cart1['Product_id'];
        }

        $product_detail = franchise_model::whereIn('Product_id', $Product_id)->get();
        return view('After_login/cart_list', compact('cart', 'product_detail'));
    }
    public function remove_from_cart($id)
    {
        $check = cart::where('cart_id', $id)->delete();

        return redirect('cart_list');
    }
    public function place_cart_order()
    {
        $User_id = session('user_id');
        $cart = cart::where('User_id', $User_id)->get();
        foreach($cart as $cart1){
            $qt = $cart1['Quantity'];
            $product = franchise_model::where('Product_id', $cart1['Product_id'])->first();
        if ($product) {
            if ($product['Quantity'] > 0) {
                order::insert([
                    'Product_id' => $cart1['Product_id'],
                    'User_id' => $User_id,
                    'Quantity' => $qt,
                    'Price' => $cart1['Price'],
                    'Discount_Amount' => $cart1['Discount_Amount'],
                    'Delivery_status' => 'Pending',
                ]);
                cart::where('cart_id', $cart1['cart_id'])->delete();
                franchise_model::where('Product_id', $product['Product_id'])->update([
                    'Quantity' => $product['Quantity'] - $qt,
                ]);
            } else {
                session()->flash('error', 'Product is out of Stock, please wait till the new stock of this product arrive');
            }
        } else {
            return redirect('After_Franchise');
        }
    }
        session()->flash('succ', 'Products Ordered Successfully');
        return redirect('cart_list');
    }
    public function Book_Ticket(Request $req)
    {
        $User_id = session('user_id');
        $check = ticket_book::insert([
            'User_id' => $User_id,
            'Quantity' => $req->Quantity,
            'Price' => $req->Price,
            'Movie_id' => $req->Movie_id,
            'Movie_picture' => $req->pic,
            'Time' => $req->Time,
            'Ticket_date' => $req->Date,
        ]);

        if ($check) {
            session()->flash('succ', 'Ticket Boocked Successfully');
            DB::table('movies')
                ->where('Movie_id', $req->Movie_id)
                ->decrement('available_tickets', $req->Quantity);
        }else{
            session()->flash('err', 'Something Went wrong try again lateer');
        }

        return redirect('After_Movies');
    }

    public function Ticket_list()
    {
        $User_id = session('user_id');

        $t_data = ticket_book::where('User_id', $User_id)->get();

        $Movie_id = [];
        foreach ($t_data as $tic) {
            $Movie_id[] = $tic['Movie_id'];
        }
        $movie_detail = movies_model::whereIn('Movie_ID', $Movie_id)->get();

        return view('After_login/ticket_list', compact('t_data', 'movie_detail'));
    }

    public function remove_ticket($id)
    {
        $check = ticket_book::where('Ticket_id', $id)->delete();

        return redirect('ticket_list');
    }

    public function search_franchise(Request $req)
    {
        // echo $req->search;
        $cosplay = franchise_model::select()
            ->where('Product_name', 'like', '%' . $req->search . '%')
            ->take(3)
            ->get();

        return view('After_login/search_franchise', compact('cosplay'));
    }

    public function review_rating(Request $req)
    {
        $User_id = session('user_id');

        $check = review_rating::insert([
            'Product_id' => $req->product_id,
            'Description' => $req->review,
            'Rating' => $req->rating,
            'User_id' => $User_id,
        ]);
        if ($check) {
            session()->flash('succ', 'Feedback Submitted');
        } else {
            session()->flash('error', 'Something went wrong');
        }
        return redirect('order_list');
    }
    //Offers
    public function validate_coupon($id , $coupon) {
        $offer = offers::where('Coupon', $coupon)->first();
        $franchise = franchise_model::where('Product_id', $id)->first();
        if ($offer) {
            // Check if the offer has an expiry date
            if ($offer->Expiry_Date) {
                $currentDate = Carbon::now('Asia/Kolkata');
                $expiryDate = Carbon::parse($offer->Expiry_Date);

                if ($currentDate->lte($expiryDate)) {
                        if($offer->Status=="Unused"){
                            if($offer->Minimum_price <= $franchise->Price){
                                session(['Discount_Amt' => $offer->Discount_amount]);
                            session(['Coupon_ID' => $offer->Offer_ID]);
                            return redirect('product_detail_after_discount/'.$id);
                            }else{
                                return redirect()->back()->with('error', 'Coupon doesnot meet the requirements.');
                            }

                        }else{
                            return redirect()->back()->with('error', 'Coupon is already Used.');
                        }
                } else {
                    return redirect()->back()->with('error', 'Coupon has expired.');
                }
            } else {
            }
        } else {
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }
    }
    public function product_detail_after_discount($id)
    {
        $data = franchise_model::where('Product_id', $id)->first();

        $suggestion = franchise_model::where('Category', $data['Category'])
            ->get()
            ->take(4);
            $discountAmount = session('Discount_Amt');
            $calculatedPrice = $data['Price'] - $discountAmount;
        return view('After_login/product_detail_after_discount', compact('data', 'suggestion','calculatedPrice'));
    }
}
