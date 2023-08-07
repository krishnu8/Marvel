
@extends('layouts.master')
    <style>
        .text1 {
            color: #fff;
            font-size: 22px;
        }
        .nav{
            height: 100%;
        }
        .r{
    width: 100%;
    display:flex; justify-content:space-evenly;
    }
        .about {
            color: red;
            font-size: 30px;
        }
        body{
            display:flex ;flex-direction: column;flex-wrap: nowrap;word-wrap: none;height:100vh;
        }
        .r0{
            background-color: red;padding:20px;
        }
        .about0{
            border-bottom: rgb(230, 8, 8);margin-left: 45%;
        }
    </style>
</head>

<body>
   @section('body')
       
    <section class="nav">
        <div class="about0">
            <div class="about"> <u>About Us</u><br></div>
        </div>
        <br>
        <div class="ab">
            @foreach ($data as $r)
            <div class="row r">
                <div class="col-sm-12 col-md-6 col-lg-5"><img src="pictures/{{$r['Image']}}" alt=""
                        width="100%"></div><br>
                <div class="col-sm-12 col-md-6 col-lg-5 r0">
                    <div class="text1"><br>
                        {{$r['Text']}}
                    </div>
                </div>
            </div>
            @endforeach
            <div style="height:20px;"></div>
        </div>
    </section>
   @endsection