@extends('layouts.After_header')
<title>Product Detail</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #f5f5f5
    }

    .hedding {
        font-size: 20px;
        color: #ab8181`;
    }

    .main-section {
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translate(-50%, 5%);
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #E45641;
    }

    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }

    @media (min-width:360px) and (max-width:640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }
    }
</style>
@section('body')

    <div class="container-fluid" style="width: 100%">
        <div class="col-lg-12 border  main-section bg-white">
            <div class="row m-0">
                <div class="col-lg-4 left-side-product-box pb-3">
                    <img src="{{ URL::to('/') }}/pictures/products/{{ $data['Image'] }}" class="border p-3">

                    <div class="card rev" style="height: 235px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="color: blue; font-weight: bold;">Rating & Review</li>
                        </ul>
                        @if ($feedback->isNotEmpty())
                            <div class="card"
                                style="height: 215px; scroll-behavior: smooth; overflow-y: scroll; background-color: #d5ceceb5;">
                                @foreach ($feedback as $f)
                                    <div class="card" style="margin: 5px; padding: 5px;     ">
                                        <div style="display: inline-flex">
                                            @for ($i = 0; $i < $f['Rating']; $i++)
                                                <i class="fas fa-star" style="color: yellow;"></i>
                                            @endfor
                                        </div>
                                        <p>{{ $f['Description'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="card"
                                style="height: 215px; scroll-behavior: smooth; overflow-y: scroll; background-color: #d5ceceb5">

                                <div class="card" style="margin: 5px">
                                    <p>No review rating</p>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="right-side-pro-detail border p-3 m-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <span>Marvel</span>
                                <p class="m-0 p-0">{{ $data['Product_name'] }}</p>
                            </div>
                            <div class="col-lg-12">
                                <p class="m-0 p-0 price-pro">RS {{ $data['Price'] }}</p>
                                <hr class="p-0 m-0">
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h5>Product Detail</h5>
                                <span></span>
                                <hr class="m-0 pt-2 mt-2">
                            </div>
                            <div class="col-lg-12">
                                <p class="tag-section"><strong>Category : </strong>{{ $data['Category'] }} </p>
                            </div>
                            {{-- <form action="Buy_product" style="width: 100%;" method="post"> --}}
                            <div class="col-lg-12">
                                <h6>Quantity :</h6>
                                @if ($data['Quantity'] <= 0)
                                    <p style="color: red; font-weight: 1px; size: 5px">out of stock</p>
                                @else
                                    @if ($data['Quantity'] > 5)
                                        <div class="form-group">
                                            <select class="form-control" id="selectOptions" name="quantity">

                                                <option value="1"> 1</option>
                                                <option value="2"> 2</option>
                                                <option value="3"> 3</option>
                                                <option value="4"> 4</option>
                                                <option value="5"> 5</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <select class="form-control" id="selectOptions" name="quantity">

                                                @for ($i = 1; $i <= $data['Quantity']; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    @endif
                                @endif
                            </div>

                            @if ($data['Quantity'] > 0)
                            <div class="col-lg-12 pt-2">
                                <h5>Offers (Optional)</h5>
                                <span></span>
                                <input class="form-control" id="Coupon" type="text" placeholder="Coupon Code">
                                @if (session('error'))
                                    <small id="coup_err" style="color: red">{{ session('error') }}</small>
                                @endif
                                <small id="coup_err" style="color: red"></small>
                                <Button onclick="Coupon()" class="btn btn-primary w-100" style="margin-top: 5px">Apply
                                    Coupon</Button>

                            </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <button onclick="cart()" class="btn btn-danger w-100">Add To Cart</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <Button onclick="Buy()" class="btn btn-success w-100">Shop Now</Button>
                                        </div>
                                </div>
                            @endif


                            {{-- </form> --}}
                        </div>
                    </div>

                    {{-- similar product  --}}
                    <div class="row">
                        <div class="col-lg-12 text-center pt-3">
                            <h4>Similar Product</h4>
                        </div>
                    </div>
                    <div class="row mt-3 p-0 text-center pro-box-section">

                        @foreach ($suggestion as $sug)
                            <div class="col-lg-3 pb-2">
                                <a href="{{ URL::to('/') }}/product_detail/{{ $sug['Product_id'] }}">
                                    <div class="pro-box border p-0 m-0">
                                        <img src="{{ URL::to('/') }}/pictures/products/{{ $sug['Image'] }}">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    function Buy() {
        var x = document.getElementById('selectOptions').value;
        window.location.href = 'http://127.0.0.1:8000/Buy_product/{{ $data['Product_id'] }}/' + x;
    }

    function cart() {
        var x = document.getElementById('selectOptions').value;
        window.location.href = 'http://127.0.0.1:8000/add_to_cart/{{ $data['Product_id'] }}/' + x;
    }

    function Coupon() {
        var x = document.getElementById('Coupon').value;
        var coupErrElement = document.getElementById('coup_err');
        if (x == '') {
            coupErrElement.innerText = "Field cannot be empty.";;
        } else {
            window.location.href = 'http://127.0.0.1:8000/apply_coupon/{{ $data['Product_id'] }}/'+x;
        }
    }
</script>
