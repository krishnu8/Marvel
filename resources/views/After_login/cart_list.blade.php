@extends('layouts.After_header')
<title>Cart</title>

<body>
    @section('body')
        <style>
            <>body {
                background: #eee
            }

            .ratings i {
                font-size: 16px;
                color: red
            }

            .strike-text {
                color: red;
                text-decoration: line-through
            }



            .dot {
                height: 7px;
                width: 7px;
                margin-left: 6px;
                margin-right: 6px;
                margin-top: 3px;
                background-color: blue;
                border-radius: 50%;
                display: inline-block
            }

            .spec-1 {
                color: #938787;
                font-size: 15px
            }

            h5 {
                font-weight: 400
            }

            .para {
                font-size: 16px
            }
        </style>
        @if (session('succ'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="min-width: 500px; right: 20px; top: 100px; z-index:1; position: absolute;">
                {{ session('succ') }}
            </div>

            <script>
                // Automatically close the alert after 5 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 3000);
            </script>
        @endif

        @if (session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="min-width: 500px; right: 20px; top: 100px; z-index:1; position: absolute;">
                {{ session('error') }}
            </div>

            <script>
                // Automatically close the alert after 5 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 3000);
            </script>
        @endif
        <div class="container-fluid mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($cart as $o)
                        @foreach ($product_detail as $p)
                            @if ($o['Product_id'] == $p['Product_id'])
                                <div class="row p-2 bg-white border rounded">
                                    <a href="{{ URL::to('/') }}/product_detail/{{ $p['Product_id'] }}">
                                        <div class="col-md-3 mt-1" style="text-align: center"><img
                                                class=" img-responsive rounded" height="175px" width="175px"
                                                src="{{ URL::to('/') }}/pictures/products/{{ $p['Image'] }}">
                                        </div>
                                    </a>

                                    <div class="col-md-6 mt-1">
                                        <a href="{{ URL::to('/') }}/product_detail/{{ $p['Product_id'] }}">
                                            <h5 style="color:black;">{{ $p['Product_name'] }}</h5>
                                        </a>
                                        <div class="d-flex flex-row">
                                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Each
                                                {{ $o['Price'] }}</span></div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Quantity:
                                                {{ $o['Quantity'] }} </span></div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Discount Amount:
                                                {{ $o['Discount_Amount'] }} </span></div>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @if ($p['Quantity'] == 0)
                                            @php
                                                $count = 1;
                                            @endphp
                                            <h3 style="color:red;">Out of stock</h3>
                                        @elseif($p['Quantity'] < $o['Quantity'])
                                            @php
                                                $count = 1;
                                            @endphp
                                            <h3 style="color:red;">Only {{ $p['Quantity'] }} available</h3>
                                        @endif

                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                        <div style="color: red"><b>
                                                <h4>Final Price</h4>
                                            </b></div>
                                        <div class="d-flex flex-row align-items-center">
                                            <h4 class="mr-1">
                                                Rs.{{ $o['Price'] * $o['Quantity'] - $o['Discount_Amount'] }}
                                            </h4>
                                        </div>
                                        <div class="d-flex flex-column" style="margin-top:60px;">
                                            <a href="remove/{{ $o['cart_id'] }}" class="btn btn-danger btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $subtotal = $o['Price'] * $o['Quantity'] - $o['Discount_Amount'];
                                    $totalPrice += $subtotal;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                </div>
                @if ($cart->isEmpty())
                    <div class="col-lg-6" style="font-size: 40px;color:rgb(129, 126, 126);">
                        <center>Cart is Empty</center>
                    </div>
                @else
                    @if ($count == 0)
                    <div class="col-lg-6" style="margin-top:20px;">
                        <center>
                            <h2 style="color: green">Total Price: Rs.{{ $totalPrice }}</h2>
                        </center>
                        <a href="place_cart_order"><button class="btn btn-primary w-100">Place Orders</button></a>
                    </div>
                    @else
                    <div class="col-lg-6" style="margin-top:20px;">
                        <center>
                            <h2 style="color: green">Total Price: Rs.{{ $totalPrice }}</h2>
                        </center>
                        <button class="btn btn-danger w-100">Order can not be placed</button>
                    </div>
                    @endif
                @endif

            </div>
        </div>
    @endsection
