    @extends('layouts.master')
    <style>
        .green:hover {
            background-color: rgb(43, 174, 43);
        }

        .mov_img {
            width: 270px;
            height: 400px;
        }

        .book_btn1 {
            height: 7%;
            width: auto;
            font-size: 15px;
            border-color: rgb(6, 40, 232);margin-top: 30%;margin-left: 7%;
        }
        .book_btn2 {
            height: 7%;
            width: auto;
            font-size: 15px;
            border-color: rgb(6, 40, 232);margin-top: 1%;margin-left: 7%;
        }
        .book_tkt {
            height: 35px;
            width: 200px;
            font-size: 15px;
        }

        .mov_img:hover {
            margin-top: -10px;
        }

        .mov_text {
            font-weight: 400;
        }
        .space{
            background-color:black;height:20px
        }
        .poster{
            background-image:url(pictures/antman4.jpg) ;height:auto;background-repeat: no-repeat;background-size: contain;background-color: black;background-position: center;
        }
        .lineBreak{
            width:95%;height:2px;background-color: rgb(49, 49, 48);
        }
        .title{
            font-size: 30px;margin-left: 7%;color:red;
        }
    </style>
</head>
<body>
@section('body')

<div class="space"></div>
<div class="poster">
    <button type="button" class="btn btn-outline-danger green book_btn1"><b>Hurry Up!</b></button><br>
    <button type="button" class="btn btn-outline-danger book_btn2"><b>Book Tickets now</b></button><br>
    <div style="height:20px;"></div>
</div><br>
<div class="container-fluid">
    <div class="row">
        @foreach ($current as $r)
            <div class="col-sm-12 col-md-6 col-lg-4" style="padding-bottom:20px;">
                <div>
                    <center><img src="pictures/movies/{{$r['pic']}}" class="fluid mov_img"><br>
                        <div class="mov_text">
                            {{$r['Movie_Name']}} <br>
                            Release Date:
                            {{$r['Release_Date']}}<br><br>
                            <div class="container">
                            <button href="#" data-toggle="popover" title="Ticket Booking" class="btn btn-outline-danger book_tkt"
                                data-content="Login to book tickets">Book Tickets</button>
                        </div><br><br>
                        </div>


                        <script>
                            $(document).ready(function () {
                                $('[data-toggle="popover"]').popover();
                            });
                        </script>

                    </center>
                </div>
            </div>
        @endforeach
    </div>
</div><br>
<center>
<div class="lineBreak"></div>
</center><br>
<div class="title"><u>Upcoming Movies...</u></div><br>
<div class="container-fluid">
    <div class="row">
        @foreach ($upcoming as $r)
        <div class="col-sm-12 col-md-6 col-lg-4" style="padding-bottom:20px;">
            <div>
                <center><img src="pictures/movies/{{$r['pic']}}" class="fluid mov_img"><br>
                    <div class="mov_text">
                        {{$r['Movie_Name']}} <br>
                        Release Date:
                        {{$r['Release_Date']}}<br>
                    </div>
                </center>
            </div>
        </div>
        @endforeach
</div>
</div><br>
<center>
<div class="lineBreak"></div>
</center><br>
<div class="title"><u>Top Grossing Movies</u></div><br>
<div class="container-fluid">
    <div class="row">
        @php
            $count=0;
        @endphp
        @foreach ($top as $r)
            @php
                $count++;
            @endphp
            <div class="col-sm-12 col-md-6 col-lg-4" style="padding-bottom:20px;">
                <div>
                    <center><img src="pictures/movies/{{$r['Image']}}" class="fluid mov_img"><br>
                        <div class="mov_text">
                            <b>#{{$count}}<br></b>
                            {{$r['Movie_Name']}}<br>
                            Released Date:
                            {{$r['Release_Date']}} <br>
                            World wide Gross:$
                            {{$r['Total_Gross']}}<br><br>
                        </div>
                    </center>
                </div>
            </div>
        @endforeach
    </div>
</div><br>

@endsection
