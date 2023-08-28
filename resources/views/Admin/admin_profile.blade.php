<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">

            <h1>Profile</h1>

            <div class="pro">
                <div class="pro_pic">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="">
                </div>
                <div class="info">
                    <form class="profile" action="#" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <b>Name:</b>
                                <p><b>Raghunath Yadav</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Mobile:</b>
                                <p>
                                    <b>9812919285</b>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>E-mail:</b>
                                <p>
                                    <b>ryadav564@rku.ac.in</b>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Password:</b>
                                <p>
                                    <b>********</b>
                                </p>
                            </div>
                        </div>
                        <div class="row" style="text-align:center;">
                            <div class="col">
                                <a href="{{ URL::to('/') }}/admin_profile_edit"><input type="button" value="Edit" class="submit"></a>

                                <input type="button" value="Delete" class="reset" data-toggle="modal" data-target="#msgDelete" style="font-family: JetBrains Mono;">

                            </div>
                        </div>
                        <div class="row">
                            <input type="button" value="Change Password" class="reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @endsection
</body>

</html>