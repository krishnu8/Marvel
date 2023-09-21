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
                <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                    <div class="row g-0 " style="height:100%;">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/background/wall1.jpg'); background-size: cover;">

                            <div class="edit_pro_img">
                                <label for="update_pic">
                                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" class="pro_img">
                                </label>
                                <form action="" method="post">
                                    <input type="file" id="update_pic" name="profile_pic" oninput="update()">
                                    @error('profile_pic')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-info" id="update_btn">Update picture</button>

                                </form>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h3>Profile</h3>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Name</h6>
                                        <p class="text-muted" style="margin-bottom: 30px;">ashj</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted" style="margin-bottom: 30px;">qwertyui</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">12345678</p>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted">Male</p>
                                    </div>
                                </div>

                                <h6 style="margin-top: 50px">Description</h6>
                                <div style="width: 50%">
                                    <div class="row" style="text-align:center;">
                                        <div class="col-4 mb-3">
                                            <a href="{{ URL::to('/') }}/admin_profile_edit">
                                                <input type="button" value="Edit" class="submit">
                                            </a>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="button" value="Delete" class="reset" style="font-family: JetBrains Mono;">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="button" value="Change Password" class="reset">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
<script>
    function update() {
        document.getElementById("update_btn").style.display = "block";
    }
</script>

{{-- <div class="info">
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

    </form>
</div> --}}
