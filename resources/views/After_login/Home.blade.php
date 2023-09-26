    @extends('layouts.after_login_master')
    <style type="text/css">
        .a {
            width: 40%;
            display: inline-block;
            padding: 5px;
            margin: 45px 25px;
            text-align: right;
            height: fit-content;
            color: rgb(250, 251, 252);
        }

        .nav {
            min-height: fit-content;
            background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url(pictures/bg1.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
            border: #61d394 solid 2px;
        }

        a {
            text-decoration: none;
        }

        .r {
            display: flex;
            justify-content: space-evenly;
            width: 100%;
        }

        .b {
            background-color: rgb(238, 35, 20);
            height: fit-content;
            align-items: center;
            margin: 20px;
        }

        .c {
            text-align: justify;
            padding: 5px;
            margin: 5px;
            display: inline-block;
            width: 20%;
            word-wrap: none;
            height: 600px;

        }

        .cc {
            text-align: justify;
            padding: 5px;
            margin: 5px;
            display: inline-block;
            width: 20%;
            word-wrap: none;
            height: 600px;

        }

        .d {
            text-align: justify;
            padding: 0px 7px;
            margin: 0px;
            display: inline-block;
            width: 30%;
        }

        .snapTxt {
            display: inline;
            height: 90px;
            width: 80px;
            color: #ff0000;
        }

        .f {
            margin-left: 93px;
        }

        .g {
            width: 80%;

        }

        .space {
            height: 5px;
        }


        .snap {
            height: 90px;
            width: 80px;
            background-position: center;
            background-size: cover;
        }

        .snap1 {
            background-image: url(pic/gau.gif);
        }

        .snap1 img {
            display: none;
        }

        .about {
            background-color: transparent;
            border-color: #ff0000;
            border-radius: 10px;
            height: 40px;
            width: 100px;
        }

        @media only screen and (max-width:1010px) {
            html {
                font-size: 60%;
            }

            div .about_avg {
                display: flex;
                flex-direction: column;
                height: 500px;
            }

            .navigation ul {
                display: flex;
                flex-direction: column;
                text-align: right;
                justify-content: center;
            }

            .a {
                margin: 5px;
                margin-right: -100px;
            }

            #about {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .c {
                text-align: center;
                padding: 5px;
                display: flex;
                flex-direction: column;
                width: 500px;
                font-size: 15px;
            }

            .c img {
                height: 40%;
            }

            .cc {
                text-align: center;
                padding: 5px;
                display: flex;
                flex-direction: column;
                width: 500px;
                font-size: 15px;
            }

            .cc img {
                height: 40%;
            }

            .a {
                display: flex;
                justify-self: center;
                width: 80%;
                height: 50%;
                margin-left: -100px;
            }

            .b {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .avg_txt {
                text-align: center;
            }
        }

        .jr {
            margin: 5px;
            margin-bottom: 50px;
        }

        .about_avg {
            border: #ff0000 solid 2px;
            height: max-content;
        }

        .avg_txt {
            height: auto;
            width: 50%;
            display: inline-block;
        }

        .d0 {
            padding: 30px;
            display: flex;
            justify-content: center;
        }
    </style>
<body style="justify-content: center;">
@section('body')
    <section class="nav">
    <div style="color: white;">
        <div class="b">
            <div class="a">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @php
                            $count=1;
                        @endphp
                        @foreach ($data as $d)
                        @if ($count==1)
                        @php
                            $count++;
                        @endphp
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="pictures/{{$d['Image']}}">
                        </div>
                        @else
                        <div class="carousel-item">
                            <img class="d-block w-100" src="pictures/{{$d['Image']}}">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @foreach ($data1 as $d)
            <div class="avg_txt">
                <h3 style="margin-bottom: 10px;">
                    {{$d['Text0']}} <br>
                    {{$d['Text1']}} <br>
                </h3>
                {{$d['Text2']}} <br><br>
            </div>
            @endforeach
        </div>
        @foreach ($data1 as $d)
        <div class="d0">
            <div class="d">
                <h3></h3>
                {{$d['Text3']}}
            </div>
            <div class="d">
                <h3></h3>
                {{$d['Text4']}}
            </div>
            <div class="d">
                <h3></h3>
                {{$d['Text5']}}
            </div>
        </div>
            @endforeach
        <br><br>
</section><br>
<div class="about_avg"><br>
    <div class="f">
        <div class="snap" id="snap"><img src="pictures/gau1.jpg" alt="" height="90px" width="80px" onclick="fun2()"
                onmouseleave="fun3()"></div>
        <div class="snapTxt"><b>Click the Gauntlet to Snap</b></div><br><br>
        <h3 align="left">About Some Avengers</h3>
    </div><br>

    <div class="row r">
        @foreach ($data2 as $r)
        <div class="col-sm-8 col-md-4 col-lg-3 col-vs-10 jr">
            <img src="pictures/{{$r['Image']}}" width="100%" height="40%">
            <div class="aa">
                <font size="5px">
                    {{$r['Superhero_Name']}}<br>
                </font>
                {{$r['Description']}}
            </div>
            <br>
            <center>
                <a href="after_charProfile/{{$r['Character_Name']}}"><button class="about">Profile</button></a>
            </center>
        </div>
        @endforeach
    </div>
</div>
</div><br>
@endsection
