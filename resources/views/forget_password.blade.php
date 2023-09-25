<!DOCTYPE html>
<html lang="en">
<title>Forget Password</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.147.0/three.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <style>
        * {
            font-family: JetBrains Mono;
        }

        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            background: black;
            overflow: hidden;
            background-image: url(pictures/walll.jpg);
            background-size: cover;
            background-position: center;
        }


        /* Main Start */
        main {
            position: absolute;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* background-color: #00ff75; */
        }

        .card1 {
            width: 350px;
            height: 500px;
            border-radius: 20px;
            transition: all .3s;
            z-index: 1;
            background: rgba(115, 115, 117, 0.714);
            opacity: 0.7;
        }

        .card2 {
            width: 350px;
            height: 500px;
            background-color: black;
            border-radius: 20px 300px;
            transition: all .2s;
            padding: 15px;
        }

        .card1:hover {
            background: rgba(115, 115, 117, 0.714);
        }

        .card1:hover .card2 {
            border-radius: 300px 20px;
        }

        form div:nth-child(1) {
            margin-bottom: 15px;
            color: white;
        }

        form div:nth-child(2) {
            margin-bottom: 75px;
        }

        form div:nth-child(3) {
            margin-bottom: -10px;
        }

        form div:nth-child(4) {
            margin-bottom: -25px;
        }

        form div:nth-child(5) {
            margin-bottom: 8px;
        }

        h1 {
            width: 100%;
            text-align: center;
            font-family: JetBrains Mono;
            margin-bottom: 10px;
            color: black;
            border: 2px white solid;
            border-radius: 6px;
            padding: 2px 10px;
            background-color: #CCCCCC;
            width: fit-content;
            opacity: 1;
        }

        input[type=text] {
            background-color: transparent;
            border: white solid 0.5px;
            color: white;
        }

        input[type=password] {
            background-color: transparent;
            border: white solid 0.5px;
            color: white;
        }

        input[type=submit] {
            background-color: #ffffff00;
            border: none;
            color: white;
            margin-right: 10px;
            box-shadow: 3px 3px 3px #CCCCCC;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            opacity: 10;
        }

        input[type=reset] {
            margin-left: 10px;
            background-color: #ffffff00;
            color: white;
            box-shadow: 3px 3px 3px #CCCCCC;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }

        input[type=button] {
            background-color: #ffffff00;
            color: #1a1a1a;
            box-shadow: 3px 3px 3px #CCCCCC;

            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }


        /* .row .col input[type=submit]:hover {
            background-color: transparent;
            color: white;
            border: none;
        }

        .row .col input[type=reset]:hover {
            background-color: transparent;
            color: white;
            border: none;
        } */

        .new input[type=button] {
            background-color: transparent;
            color: white;
            border: none;
        }

        .forgt input[type=button] {
            background-color: transparent;
            color: white;
            border: none;
        }

        /* Main End */
    </style>
</head>

<body>
    <!-- Main Start-->


    <main>

        @if (session('forget'))
            <div class="alert forget alert-warning alert-dismissible fade show" role="alert"
                style="min-width: 350px; right: 20px; top: 50px; z-index:1; position: absolute;">
                {{ session('forget') }}
            </div>

            <script>
                // Automatically close the alert after 5 seconds
                setTimeout(function() {
                    $('.forget').alert('close');
                }, 3000);
            </script>
        @endif
        <div class="row card1">
            <div class="col-12 card2">
                <center>
                    <h1>Forget Password</h1>
                </center>
                <br>
                <form method="get" action="forget_pass">

                    <div class="row">
                        <div class="col">
                            <input type="text" name="em" placeholder="Email" id="em1"
                                class="form-control">
                        </div>
                        @error('em')
                            <small style="color: red">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>


                    <div class="row" style="text-align:center;">
                        <div class="col">
                            <input type="submit" value="Submit" name="btn-login" class="login">

                            <input type="reset" value="Reset" name="btn-message" class="reset">
                        </div>
                    </div>
                    <div class="row" style="text-align:center;">
                        <div class="col">
                            <p> Don't have an Account? &nbsp;&nbsp;<a class="new" href="register_form"><br><input
                                        type="button" value="Create Account" name="btn-message" class=""></a></p>
                        </div>
                    </div>
                    <div class="row" style="text-align:center;">
                        <div class="col">
                            <p> Have Account Login? <br><a class="forgt" href="#"> <input type="button"
                                        value="Login" name="btn-message" class=""></a></p>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </main>


    <!-- Main End -->
</body>

</html>
