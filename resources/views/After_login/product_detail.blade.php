@extends('layouts.After_header')

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
                    <img src="http://nicesnippets.com/demo/pd-image1.jpg" class="border p-3">
                </div>
                <div class="col-lg-8">
                    <div class="right-side-pro-detail border p-3 m-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <span>Who What Wear</span>
                                <p class="m-0 p-0">Women's Velvet Dress</p>
                            </div>
                            <div class="col-lg-12">
                                <p class="m-0 p-0 price-pro">$30</p>
                                <hr class="p-0 m-0">
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h5>Product Detail</h5>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris.</span>
                                <hr class="m-0 pt-2 mt-2">
                            </div>
                            <div class="col-lg-12">
                                <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a
                                        href="">,Man</a></p>
                            </div>
                            <div class="col-lg-12">
                                <h6>Quantity :</h6>
                                <div class="form-group">
                                    <select class="form-control" id="selectOptions" name="quantity" >
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                        <option value="4"> 4</option>
                                        <option value="5"> 5</option>
                                        <option value="6"> 6</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#" class="btn btn-success w-100">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 text-center pt-3">
                    <h4>More Product</h4>
                </div>
            </div>
            <div class="row mt-3 p-0 text-center pro-box-section">
                <div class="col-lg-3 pb-2">
                    <div class="pro-box border p-0 m-0">
                        <img src="http://nicesnippets.com/demo/pd-b-image1.jpg">
                    </div>
                </div>
                <div class="col-lg-3 pb-2">
                    <div class="pro-box border p-0 m-0">
                        <img src="http://nicesnippets.com/demo/pd-b-images2.jpg">
                    </div>
                </div>
                <div class="col-lg-3 pb-2">
                    <div class="pro-box border p-0 m-0">
                        <img src="http://nicesnippets.com/demo/pd-b-images3.jpg">
                    </div>
                </div>
                <div class="col-lg-3 pb-2">
                    <div class="pro-box border p-0 m-0">
                        <img src="http://nicesnippets.com/demo/pd-b-images4.jpg">
                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection