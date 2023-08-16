<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.147.0/three.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
            background-image: url(pictures/wall.jpg);
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
            height: 550px;
            border-radius: 20px;
            transition: all .3s;
            z-index: 1;
            background: rgba(115, 115, 117, 0.714);
            opacity: 0.9;
        }

        .card2 {
            width: 350px;
            height: 550px;
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

        form div {
            margin-bottom: 8px;
            color: white;
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


        .row .col input[type=submit]:hover {
            background-color: transparent;
            color: white;
            border: none;
        }

        .row .col input[type=reset]:hover {
            background-color: transparent;
            color: white;
            border: none;
        }

        .new input[type=button] {
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
        <div class="row card1">
            <div class="col-12 card2">
                <center>
                    <h1>Register</h1>
                </center>
                <br>
                <form method="get" action="#">

                    <div class="row">
                        <div class="col">
                            <input type="text" name="un" placeholder="Username" id="un1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="em" placeholder="Email" id="em1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="mob" placeholder="Mobile" id="mob1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="password" name="pwd" placeholder="Password" id="pwd1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="password" name="pwd_confirmation" placeholder="Confirm Password" id="pwd_confirmation1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="gen" value="M"> Male
                            <input type="radio" name="gen" value="F"> Female
                        </div>
                    </div>
                    <div class="row" style="text-align:center;">
                        <div class="col">
                            <input type="submit" value="Register" name="btn-submit" class="submit">

                            <input type="reset" value="Reset" name="btn-message" class="reset">
                        </div>
                    </div>
                    <div class="row" style="text-align:center;">
                        <div class="col">
                            <p> Already have an Account? &nbsp;&nbsp;<a class="new" href="login_form"><br><input type="button" value="Login" name="btn-message" class=""></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <!-- Main End -->
</body>

</html>