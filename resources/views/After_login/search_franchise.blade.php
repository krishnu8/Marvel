@extends('layouts.after_login_master')
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

    body {
        width: 100%;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
    }

    .title {
        font-size: 30px;
        margin-left: 7%;
        color: red;
    }

    .lineBreak {
        width: 95%;
        height: 2px;
        background-color: rgb(49, 49, 48);
    }

    .p {
        padding-bottom: 20px;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    @section('body')
        <section class="nav">

            <form action="{{ URL::to('/') }}/search_franchise" style="align-items: center; margin: 15px; width: 100%"
                method="POST">
                @csrf
                <div class="input-group">
                    <div class="form-outline" style="width: 80%; margin-left: 10%">
                        <input type="search" class="form-control" name="search" />
                    </div>
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </form>

            <br>
            <div class="container-fluid">
                <div class="title"><u>Search</u></div><br>
                <div class="row r">
                    @foreach ($cosplay as $d)
                        <div class="col-sm-12 col-md-6 col-lg-4 p">
                            <div>
                                <center><img src="pictures/{{ $d['Image'] }}" class="fluid mov_img"><br>
                                    <div class="mov_text">
                                        {{ $d['Product_name'] }} <br>
                                        Price:
                                        {{ $d['Price'] }}<br><br>
                                        <div class="container">
                                            {{-- <button href=""  title="Buy" class="btn btn-outline-danger book_tkt">Buy Now</button> --}}
                                            <a href="{{ URL::to('/') }}/product_detail/{{ $d['Product_id'] }}"
                                                class="btn btn-outline-danger book_tkt">Buy Now</a>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    @endforeach
                    @if ($cosplay->isEmpty())
                        <p
                            style="color: Red; text-align: center; font-size: 30px; width: 100%; padding-top:50px ;padding-bottom: 200px">
                            There is no any product with
                            this name sorry!😒</p>
                    @endif

                </div>
                <br>
            </div>
        </section>
    @endsection
