<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <section class="checkout-orders">
            <form action="order_controller" method="post">

                <h3>place your orders</h3>

                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name :</span>
                        <input type="text" name="name" placeholder="Enter your name" class="form-control name" maxlength="20" required />
                        <!-- <input type="text" onfocus=inp(); class="form-control" placeholder="Enter Name" id="name1" name="name"> -->
                    </div>
                    <div class="inputBox">
                        <span>Your Number :</span>
                        <input type="number" name="number" placeholder="enter your number" class="form-control number" min="0" max="9999999999" required />
                    </div>
                    <div class="inputBox">
                        <span>Your-Email :</span>
                        <input type="email" name="email" placeholder="enter your email" class="form-control email" maxlength="50" required />
                    </div>
                    <div class="inputBox">
                        <span>Pin code :</span>
                        <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" min="0" max="999999" class="form-control pincode" />
                    </div>
                    <div class="inputBox">
                        <span>Address line 01 :</span>
                        <input type="text" name="add_one" placeholder="e.g. flat number" class="form-control address1" maxlength="50" />
                    </div>
                    <div class="inputBox">
                        <span>Address line 02 :</span>
                        <input type="text" name="add_two" placeholder="e.g. street name" class="form-control address2" maxlength="50" />
                    </div>
                    <div class="inputBox">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">City</label>
                                </div>
                                <select name="city" class="custom-select city" id="inputGroupSelect01" required>
                                    <option selected disabled>Select your city</option>
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Jamnagar">Jamnagar</option>
                                    <option value="Katmandu">Katmandu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">State</label>
                                </div>
                                <select name="state" class="custom-select" id="inputGroupSelect01" required>
                                    <option selected disabled>Select your State</option>
                                    <option value="Gujrat">Gujrat</option>
                                    <option value="Maharastra">Maharastra</option>
                                    <option value="Madesh Pradesh">Madesh Pradesh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Country</label>
                                </div>
                                <select name="country" class="custom-select" id="inputGroupSelect01" required>
                                    <option selected disabled>Select your country</option>
                                    <option value="India">India</option>
                                    <option value="Nepal">Nepal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Payment Method</label>
                                </div>
                                <select name="pay_method" class="custom-select" id="inputGroupSelect01" required>
                                    <option selected disabled>Select your payment</option>
                                    <option value="cash on delivery">cash on delivery</option>
                                    <option value="credit card">credit card</option>
                                    <option value="paytm">paytm</option>
                                    <option value="paytm">UPI</option>
                                    <option value="paypal">paypal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="inputBox">
                        <span>Product Id :</span>
                        <input type="number" name="product_id" placeholder="enter product id" class="form-control product_id" />
                    </div>
                    <div class="inputBox">
                        <span>Product Quantity :</span>
                        <input type="number" name="product_qty" placeholder="enter product quantity" class="form-control pro_qty" />
                    </div>
                </div>

                <button type="button" name="ord" class="update-btn btn btn-secondary btn-lg btn-block" id="smb-btb">
                    Order Now
                </button>
            </form>
        </section>
    </main>
    @endsection
</body>

</html>