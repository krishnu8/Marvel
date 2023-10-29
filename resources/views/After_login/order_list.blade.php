@extends('layouts.After_header')
<title>Orders</title>

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

        <div class="container-fluid mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    @foreach ($order as $o)
                        @foreach ($product_detail as $p)
                            @if ($o['Product_id'] == $p['Product_id'])
                                <div class="row p-2 bg-white border rounded">
                                    <div class="col-md-3 mt-1" style="text-align: center"><img class=" img-responsive rounded"
                                            height="175px" width="175px"
                                            src="{{ URL::to('/') }}/pictures/{{ $p['Image'] }}">
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <h5>{{ $p['Product_name'] }}</h5>
                                        <div class="d-flex flex-row">
                                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </div>
                                            {{-- <span>Each {{ $o['Price'] }}</span> --}}
                                        </div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Each
                                                {{ $o['Price'] }}</span></div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Quantity:
                                                {{ $o['Quantity'] }} </span></div>
                                        <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>Discount Amount:
                                                {{ $o['Discount_Amount'] }} </span></div>
                                        {{-- <p class="text-justify text-truncate para mb-0">There are many variations of
                                            passages of Lorem
                                            Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or
                                            randomised words which don't look even slightly believable.<br><br></p> --}}
                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                        <div style="color: red"><b><h4>Final Price</h4></b></div>
                                        <div class="d-flex flex-row align-items-center">
                                            <h4 class="mr-1">Rs.{{ $o['Price'] * $o['Quantity']-$o['Discount_Amount'] }}</h4>
                                            {{-- <span class="strike-text">299</span> --}}
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>


                                        <div class="d-flex flex-column" style="margin-top:60px;">
                                            {{-- <button class="btn btn-primary btn-sm" type="button">Cancle Order</button> --}}
                                            {{-- <button class="btn btn-outline-primary btn-sm mt-2" type="button">Give Feedback</button> --}}

                                            @if ($o['Delivery_status'] == 'Pending')
                                                <a href="Cancle_order/{{  $o['Order_id'] }}" class="btn btn-primary btn-sm">Cancel Order</a>
                                            @else
                                                <a href="" class="btn btn-outline-primary btn-sm mt-2">Give
                                                    Feedback</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
