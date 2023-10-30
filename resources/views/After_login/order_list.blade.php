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
                    @foreach ($order as $o)
                        @foreach ($product_detail as $p)
                            @if ($o['Product_id'] == $p['Product_id'])
                                <div class="row p-2 bg-white border rounded">
                                    <a href="{{ URL::to('/') }}/product_detail/{{ $p['Product_id'] }}" >
                                    <div class="col-md-3 mt-1" style="text-align: center"><img class=" img-responsive rounded"
                                            height="175px" width="175px"
                                            src="{{ URL::to('/') }}/pictures/products/{{ $p['Image'] }}">
                                    </div>
                                </a>
                                    <div class="col-md-6 mt-1">
                                        <a href="{{ URL::to('/') }}/product_detail/{{ $p['Product_id'] }}" >
                                        <h5 style="color:black;">{{ $p['Product_name'] }}</h5></a>
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
                                            @if ($o['Delivery_status'] == 'Pending')
                                                <a href="Cancle_order/{{ $o['Order_id'] }}"
                                                    class="btn btn-primary btn-sm">Cancel Order</a>
                                            @else
                                                {{-- <a href="" class="btn btn-outline-primary btn-sm mt-2">Give Feedback</a> --}}
                                                <button class="btn btn-outline-primary btn-sm mt-2" data-toggle="modal"
                                                    data-target="#{{ $o['Order_id'] }}">Give Feedback</button>


                                                <div class="modal fade" id="{{ $o['Order_id'] }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ URL::to('/') }}/review_rating"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Review &
                                                                        Rating</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="text-align: center"><img
                                                                            src="{{ URL::to('/') }}/pictures/{{ $p['Image'] }}"
                                                                            alt="" height="40%" width="40%">
                                                                    </div>

                                                                    Rate the Product out of 5:
                                                                    <select name="rating" class="form-control">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5 </option>
                                                                    </select>

                                                                    Review: <br>
                                                                    <textarea name="review" name="review" cols="30" rows="3" class="form-control" style="resize: none"></textarea>

                                                                    <input type="text" name="product_id"  value="{{ $p['Product_id'] }}" hidden>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>

                                                                    <input type="submit" value="Save"
                                                                        class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

    {{-- <script>
        function submit() {
            var rating = document.getElementById('rating').value;
            var review = document.getElementById('review').value;
            var id=document.getElementById('product_id').value;
            if(review==""){
                review="NULL";
            }
            window.location.href = 'http://127.0.0.1:8000/review_rating/'+rating+'/'+review'/'+id;

            // alert(id);

        }
    </script> --}}
