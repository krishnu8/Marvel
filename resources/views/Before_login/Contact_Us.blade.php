@extends('layouts.master')
    <style>
        .about {
            color: red;
            font-size: 30px;
        }

        /* .about::after {
            content: '';
            width: 200px;
            height: 2px;
            background: #63d6b4;
            display: block;
            margin: auto;
        } */

        .img {
            height: 60px;
            width: 60px;
        }
        .d{
            color: white;
        }
        .btn {
           
            border:2px solid blue;
            border-radius: 5px;
            background-color:transparent;
            color: blue;
            
            font-size: 20px;
        }
        .btn:hover{
            background-color:blue;
            color: white;
        }
        @media only screen and (max-width:1000px) {
            html {
                font-size: 60%;
            }

            ul li {
                display: block;
            }

            font {
                font-size: 10px;
            }

            .img {
                height: 50px;
                width: 50px;
                margin-left: 50px;
                margin-top: -10px;
            }

            .send {
                margin-left: 30px;
            }

            .left {
                margin-left: -50px;
            }
        }
        .main{
            display:flex;flex-direction: column;width: 100%;
        }
        .aboutJr{
            padding-top: 5px;color:rgb(255, 255, 255);width:80%;
        }
        .left{
            display:flex ; flex-direction:row;justify-content: center;
        }
        .Clogo{
            border-radius: 50%; 
        }
        .Cheader{
            color:rgb(53, 231, 121); padding-left:20px ;
        }
        .Ctext{
            color: #fff; padding-left:20px ;
        }
        .send{
            background-color:rgb(255, 0, 0); height:100%;width:40%;border-radius: 5px;margin-left: 50px;margin-bottom: 20px;
        }
        .Cinput{
            height: 30px; width: 90%; background-color: #fff; border: 0; border-radius: 5px;
        }
        .formMargin{
            margin: 5px 20px; 
        }
        .ta{
            background-color: #fff; border: 0; border-radius: 5px;width: 90%;
        }
        .sm{
            color:rgb(255, 255, 255);margin: 20px;
        }
    </style>
<body style="background-color: rgb(70, 66, 66)">
    @section('body')
    <section class="nav">
        <div class="main">
            <div>
                <center>
                    <div class="about"><u>Contact Us</u></div>
                    <div class="aboutJr"><b>
                            @foreach ($data as $d)
                                {{$d['Text']}}
                            @endforeach
                        </b>
                    </div> <br>
                </center>
            </div>
            <div class="left">
                <div>
                    <div class="img"><img src="pictures/locate.png" alt="" height="100%" width="100%"
                            class="Clogo">
                    </div><br><br>
                    <div class="img"><img src="pictures/phone.webp" alt="" height="100%" width="100%"
                    class="Clogo">
                    </div><br><br>
                    <div class="img"><img src="pictures/email.png" alt="" height="100%" width="100%"
                    class="Clogo">
                    </div><br>
                </div>
                @foreach ($data as $d)
                <div>
                    <div><b>
                            <font class="Cheader">Address</font>
                            <br>
                            <font class="Ctext">
                                {{$d['Address']}}
                            </font>
                        </b></div><br><br>
                    <div><b>
                            <font class="Cheader">Phone</font>
                            <br>
                            <font class="Ctext">
                                {{$d['Phone']}}
                            </font>
                        </b></div><br><br><br>
                    <div><b>
                            <font class="Cheader">Email</font>
                            <br>
                            <font class="Ctext">
                                {{$d['Email']}}
                            </font>
                        </b></div>
                </div>
                @endforeach
                <div class="send">
                    <form onsubmit="return validation()" action="" method="POST">
                        <div class="sm">
                            <font size="5"><b>Send Message</b></font>
                        </div>
                        <div class="formMargin"><input id="name" type="text" name="n" placeholder="  Name"
                                class="Cinput">
                            <span id="usererror" class="d"></span>

                        </div>
                        <div class="formMargin"> <br> <input id="email" type="text" name="em"
                                placeholder=" E-mail"
                                class="Cinput">
                            <span id="emailerror" class="d"></span>

                        </div>

                        <div class="formMargin"><textarea name="ta" id="message" cols="36" rows="7" class="ta"
                                placeholder="  Type your message..." required></textarea></div>
                        <div class="formMargin"><button name="btn" type="submit" class="btn">
                                Submit</button></div>

                    </form>
                </div>

            </div>
        </div>
    </section><br>
    @endsection