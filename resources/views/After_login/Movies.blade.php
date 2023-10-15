    @extends('layouts.after_login_master')
    <title>Movies</title>
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
            border-color: rgb(6, 40, 232);
            margin-top: 30%;
            margin-left: 7%;
        }

        .book_btn2 {
            height: 7%;
            width: auto;
            font-size: 15px;
            border-color: rgb(6, 40, 232);
            margin-top: 1%;
            margin-left: 7%;
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

        .space {
            background-color: black;
            height: 20px
        }

        .poster {
            background-image: url(pictures/antman4.jpg);
            height: auto;
            background-repeat: no-repeat;
            background-size: contain;
            background-color: black;
            background-position: center;
        }

        .lineBreak {
            width: 95%;
            height: 2px;
            background-color: rgb(49, 49, 48);
        }

        .title {
            font-size: 30px;
            margin-left: 7%;
            color: red;
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
                                <center><img src="pictures/{{ $r['pic'] }}" class="fluid mov_img"><br>
                                    <div class="mov_text">
                                        {{ $r['Movie_Name'] }} <br>
                                        Release Date:
                                        {{ $r['Release_Date'] }}<br><br>
                                        @if ($r['available_tickets'] <= 0)
                                            <div class="container">
                                                <a href="" class="btn btn-outline-danger book_tkt"><strike>Book
                                                        Ticket</strike></a> <br>
                                                <small style="color: red">Out of stock</small>
                                            </div>
                                        @else
                                            <div class="container">
                                                {{-- <a href="" class="btn btn-outline-danger book_tkt">Book
                                                    Ticket</a> <br> --}}

                                                <button type="button" class="btn btn-outline-danger book_tkt"
                                                    data-toggle="modal" data-target="#{{ $r['Movie_Name'] }}">
                                                    Book Ticket
                                                </button>
                                            </div>
                                        @endif
                                        <br><br>
                                    </div>

                                </center>
                            </div>
                        </div>


                        <div class="modal fade" id="{{ $r['Movie_Name'] }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Book Ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="text-align: center"><img
                                                src="{{ URL::to('/') }}/pictures/{{ $r['pic'] }}" alt=""
                                                height="40%" width="40%"></div>
                                        <form action="">
                                            <div class="form-group">
                                                <label for="Quantity">Quantity</label>
                                                <select name="" id="Quantity" class="form-control"
                                                    onchange="setprice()">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <div class="form-group">
                                                        <label for="Time">Select Time</label>
                                                        <select name="" id="Time" class="form-control">
                                                            <option value="">Select Time</option>
                                                            <option value="">10AM</option>
                                                            <option value="">1PM</option>
                                                            <option value="">5PM</option>
                                                            <option value="">12Am</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-md-6">
                                                    <div class="form-group">
                                                        <label for="dateInput">Date</label>
                                                        <input type="date" class="form-control" id="dateInput">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="Price">Price</label>
                                                <input type="text" class="form-control" id="Price">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Book Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function setprice(){
                             var Quantity = parseInt(document.getElementById('Quantity').value);
                            //  var Price ={{ $r['Price'] }};
                             alert(Quantity);
                            }
                        </script>
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
                                <center><img src="pictures/{{ $r['pic'] }}" class="fluid mov_img"><br>
                                    <div class="mov_text">
                                        {{ $r['Movie_Name'] }} <br>
                                        Release Date:
                                        {{ $r['Release_Date'] }}<br>
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
                        $count = 0;
                    @endphp
                    @foreach ($top as $r)
                        @php
                            $count++;
                        @endphp
                        <div class="col-sm-12 col-md-6 col-lg-4" style="padding-bottom:20px;">
                            <div>
                                <center><img src="pictures/{{ $r['Image'] }}" class="fluid mov_img"><br>
                                    <div class="mov_text">
                                        <b>#{{ $count }}<br></b>
                                        {{ $r['Movie_Name'] }}<br>
                                        Released Date:
                                        {{ $r['Release_Date'] }} <br>
                                        World wide Gross:$
                                        {{ $r['Total_Gross'] }}<br><br>
                                    </div>
                                </center>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><br>
        @endsection

