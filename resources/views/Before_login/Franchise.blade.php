@extends('layouts.master')
    <style>
        .pro {
            background-color: rgb(98, 84, 84);
        }

        a {
            color: rgba(12, 12, 12, 0.79);
        }

        .mov_img {
            width: 270px;
            height: 300px;
        }

        .fr {
            display: flex;
            flex-direction: column;
            width: 23%;
            height: fit-content;
            padding-right: 30px;
        }

        .frTExt {
            color: #fff;
            width: 100%;
            height: 110px;
            font-weight: 500;
        }

        .space {
            height: 5px;
        }

        .pro button {
            margin-top: 20px;
            border: 0;
            border-radius: 15px;
            background-color: #f1f436;
            height: 40px;
            width: 100px;
            font-size: large;
            transition: 0.5s;
        }

        .pro button:hover {
            margin-left: 5px;
            margin-top: -1px;
            width: 110px;
            height: 45px;
            box-shadow: 5px;
            color: #fff;
            background-color: rgb(32, 230, 164);
            border-radius: 5px;
        }

        @media only screen and (max-width:1000px) {
            html {
                font-size: 60%;
            }

            ul li {
                display: block;
            }

            font {
                font-size: 15px;
            }

            .pro button {
                border-radius: 5px;
                background-color: #f1f436;
                height: 20px;
                width: 70px;
                font-size: 10px;
                transition: 0.5s;
            }

            font center {
                font-size: 16px;
            }

            button:hover {
                margin-left: 2px;
                width: 60px;
                background-color: rgb(32, 230, 164);
                border-radius: 3px;
            }

            .fr {
                display: flex;
                flex-direction: column;
                width: 23%;
                height: fit-content;
                padding-right: 10px;
            }
        }

        @media only screen and (max-width:700px) {
            .product1 {
                display: flex;
                flex-direction: column;
            }
        }

        .mov_img:hover {
            margin-top: -10px;
        }
        body{
            width: 100%;display:flex;flex-direction: column;flex-wrap: nowrap;
        }
        .title{
            font-size: 30px;margin-left: 7%;color:red;
        }
        .lineBreak{
            width:95%;height:2px;background-color: rgb(49, 49, 48);
        }
        .p{
            padding-bottom:20px;
        }
    </style>
</head>
<body>
    @section('body')
    <section class="nav">
        <br>
        <div class="container-fluid">
            <div class="title"><u>Cosplay</u></div><br>
            <div class="row r">
                    @foreach ($cosplay as $d)
                    <div class="col-sm-12 col-md-6 col-lg-4 p" >
                        <div>
                            <center><img src="pictures/products/{{$d['Image']}}" class="fluid mov_img"><br>
                                <div class="mov_text">
                                    {{$d['Product_name']}} <br>
                                    Price:
                                    {{$d['Price']}}<br><br>
                                    <div class="container">
                                        <button href="#" data-toggle="popover" title="Buy"
                                            class="btn btn-outline-danger book_tkt" data-content="Login to buy product">Buy
                                            Now</button>
                                    </div>

                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="popover"]').popover();
                                });
                            </script>
                                </div>
                            </center>
                        </div>
                    </div>
                    @endforeach
            </div>
            <br>
            <center>
                <div class="lineBreak"></div>
            </center><br>
            <div class="title"><u>Toys</u></div><br>
            <div class="row">
                @foreach ($toy as $d)
                    <div class="col-sm-12 col-md-6 col-lg-4 p" >
                        <div>
                            <center><img src="pictures/products/{{$d['Image']}}" class="fluid mov_img"><br>
                                <div class="mov_text">
                                    {{$d['Product_name']}} <br>
                                    Price:
                                    {{$d['Price']}}<br><br>
                                    <div class="container">
                                        <button href="#" data-toggle="popover" title="Buy"
                                            class="btn btn-outline-danger book_tkt" data-content="Login to buy product">Buy
                                            Now</button>
                                    </div>

                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="popover"]').popover();
                                });
                            </script>
                                </div>
                            </center>
                        </div>
                    </div>
                    @endforeach
            </div>
            <center>
                <div class="lineBreak"></div>
            </center><br>
            <div class="title"><u>Collection</u></div><br>
            <div class="row">
                @foreach ($collection as $d)
                    <div class="col-sm-12 col-md-6 col-lg-4 p" >
                        <div>
                            <center><img src="pictures/products/{{$d['Image']}}" class="fluid mov_img"><br>
                                <div class="mov_text">
                                    {{$d['Product_name']}} <br>
                                    Price:
                                    {{$d['Price']}}<br><br>
                                    <div class="container">
                                        <button href="#" data-toggle="popover" title="Buy"
                                            class="btn btn-outline-danger book_tkt" data-content="Login to buy product">Buy
                                            Now</button>
                                    </div>

                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="popover"]').popover();
                                });
                            </script>
                                </div>
                            </center>
                        </div>
                    </div>
                    @endforeach
            </div>
            <center>
            <div class="lineBreak"></div>
            </center><br>
            <div class="title"><u>Clothing</u></div><br>
            <div class="row">
                @foreach ($clothing as $d)
                    <div class="col-sm-12 col-md-6 col-lg-4 p" >
                        <div>
                            <center><img src="pictures/products/{{$d['Image']}}" class="fluid mov_img"><br>
                                <div class="mov_text">
                                    {{$d['Product_name']}} <br>
                                    Price:
                                    {{$d['Price']}}<br><br>
                                    <div class="container">
                                        <button href="#" data-toggle="popover" title="Buy"
                                            class="btn btn-outline-danger book_tkt" data-content="Login to buy product">Buy
                                            Now</button>
                                    </div>

                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="popover"]').popover();
                                });
                            </script>
                                </div>
                            </center>
                        </div>
                    </div>
                    @endforeach
            </div>
            <center>
            <div class="lineBreak"></div>
            </center><br>
            <div class="title"><u>Accessories</u></div><br>
            <div class="row">
                @foreach ($accessories as $d)
                    <div class="col-sm-12 col-md-6 col-lg-4 p" >
                        <div>
                            <center><img src="pictures/products/{{$d['Image']}}" class="fluid mov_img"><br>
                                <div class="mov_text">
                                    {{$d['Product_name']}} <br>
                                    Price:
                                    {{$d['Price']}}<br><br>
                                    <div class="container">
                                        <button href="#" data-toggle="popover" title="Buy"
                                            class="btn btn-outline-danger book_tkt" data-content="Login to buy product">Buy
                                            Now</button>
                                    </div>

                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="popover"]').popover();
                                });
                            </script>
                                </div>
                            </center>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    @endsection
