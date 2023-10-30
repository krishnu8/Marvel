<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/Before_login_css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{ URL::to('/') }}/Before_login_js/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="{{ URL::to('/') }}/Before_login_js/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ URL::to('/') }}/Before_login_js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/After_login_css/style.css">
    <script src="{{ URL::to('/') }}/Before_login_js/script.js"></script>
    <style>
        a {
            text-decoration: none;
            color: #fff;
        }

        nav {
            background-color: black;
            width: 100%;
            display: flex;
            flex-direction: row;
            padding-top: 20px;
        }

        .nav1 ul {
            display: flex;
            justify-content: space-evenly;
        }

        .navigation {
            flex-basis: 70%;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        @media only screen and (max-width:1010px) {
            .navigation ul {
                display: flex;
                flex-direction: column;
                text-align: right;
            }

            #ham {
                width: 27px;
                height: 30px;
                cursor: pointer;
                z-index: 100;
                margin-right: 22px;
            }

            .bar {
                background-color: #ffffff;
                height: 3px;
                width: 100%;
                display: block;
                border-radius: 5px;
                margin-bottom: 3px;
                transition: 0.3s ease;
            }

            #bar1 {
                transform: translateY(-4px)
            }

            #bar3 {
                transform: translateY(4px);
            }

            .icon .bar {
                background: rgb(252, 18, 18);
            }

            .icon #bar1 {
                transform: translateY(4px)rotate(-45deg);
            }

            .icon #bar3 {
                transform: translateY(-6px)rotate(45deg);
            }

            .icon #bar2 {
                opacity: 0;
            }

            .nav1 {
                display: none;
            }

            .change {
                background-color: rgba(4, 9, 30, 0.7);
                max-height: max-content;
                position: absolute;
                font-size: 15px;
                z-index: 100;
                padding: 20px;
                width: 40%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .navigation {
                align-items: flex-end;
                width: auto;
                display: flex;
                flex-direction: column;

            }

            .navigation #nav1 ul a {
                text-align: center;
            }

        }

        .box {
            margin: 100px 100px;
            position: relative;
        }

        .box .square {
            position: absolute;
            backdrop-filter: blur(5px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            animation: animate 10px linear infinite;
            animation-delay: calc(-1s * var(--i));
        }

        @keyframes animate {

            0%,
            100% {
                transform: translateY(-40px);
            }

            50% {
                transform: translateY(40px);
            }
        }

        .box .square:nth-child(1) {
            top: -50px;
            right: -60px;
            width: 100px;
            height: 100px;
        }

        .box .square:nth-child(2) {
            top: 150px;
            left: -100px;
            width: 120px;
            height: 120px;
            z-index: 2;
        }

        .box .square:nth-child(3) {
            bottom: 50px;
            right: -60px;
            width: 80px;
            height: 80px;
        }

        .box .square:nth-child(4) {
            bottom: 80px;
            left: 100px;
            width: 50px;
            height: 50px;
        }

        .box .square:nth-child(5) {
            top: -80px;
            left: 140px;
            width: 60px;
            height: 60px;
        }

        nav ul li {
            list-style: none;
            display: inline-block;
            padding: 8px 12px;
            border-radius: 3px;
            position: relative;
            color: rgb(255, 255, 255);
            position: relative;
        }

        nav ul li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #f44336;
            display: block;
            margin: auto;
            transition: 0.7s;
        }


        nav li:hover::after {
            width: 100%;
        }

        .logo {
            flex-basis: 30%;
            padding-left: 25px;
        }

        .list1:hover {
            background-color: rgb(131, 131, 150);
        }
    </style>
</head>
<nav>
    <div class="logo">
        <a href="index.php"><img src="{{ URL::to('/') }}/pictures/hen.png" height="40px" width="100px">
        </a>
    </div>
    <div class="navigation">
        <div class="nav1" id="nav1">
            <ul>
                <a href="{{ URL::to('/') }}/After_home">
                    <li>Home</li>
                </a>
                <a href="{{ URL::to('/') }}/After_Gallery">
                    <li>Gallery</li>
                </a>
                <a href="{{ URL::to('/') }}/After_Movies">
                    <li>Movies</li>
                </a>
                <a href="{{ URL::to('/') }}/After_Franchise">
                    <li>Franchise</li>
                </a>
                <a href="{{ URL::to('/') }}/After_Contact_Us">
                    <li>Contact Us</li>
                </a>
                <a href="{{ URL::to('/') }}/After_About_Us">
                    <li>About Us</li>
                </a>
                {{-- <a href="Login">
                    <li id="log">Log in</li>
                </a> --}}
                <li>
                    <div class="dropdown check">
                        <button style="background-color: transparent;" type="button"
                            class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ URL::to('/') }}/pictures/set.png" alt="" height="25px" weight="30px">
                            More:
                        </button>
                        <div class="dropdown-menu dropmenu">
                            {{-- <a class="dropdown-item drop list1" href=""><b>Play Quiz</b></a> --}}
                            <a class="dropdown-item drop list1" href="{{ URL::to('/') }}/After_profile"><b>My profile</b></a>
                            <a class="dropdown-item drop list1" href="{{ URL::to('/') }}/order_list"><b>Orders</b></a>
                            <a class="dropdown-item drop list1" href="{{ URL::to('/') }}/cart_list"><b>Cart</b></a>
                            <a class="dropdown-item drop list1" href="{{ URL::to('/') }}/ticket_list"><b>Tickets</b></a>
                            <a class="dropdown-item drop list1" href="{{ URL::to('/') }}/logout" onclick="alert('Are you sure want to logout')"><b>Logout</b></a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div id="ham" onclick="onClickMenu()">
            <div id="bar1" class="bar"></div>
            <div id="bar2" class="bar"></div>
            <div id="bar3" class="bar"></div>
        </div>
    </div>
</nav>
@yield('body')

</body>

</html>
<script>
    function onClickMenu() {
        document.getElementById("ham").classList.toggle("icon");
        document.getElementById("nav1").classList.toggle("change");
    }
</script>
