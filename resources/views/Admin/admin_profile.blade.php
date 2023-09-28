<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style type="text/css">

    </style>
</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
            @if (session('error'))
                <script>
                    swal({
                        title: "Sorry!",
                        text: "{{ session('error') }}",
                        icon: "warning",
                        button: "OK",
                    });
                </script>
            @endif

            @if (session('succ'))
                <script>
                    swal({
                        title: "Congratulations!",
                        text: "{{ session('succ') }}",
                        icon: "success",
                        button: "OK",
                    });
                </script>
            @endif

            <div class="container-fluid">
                <div class="card1 mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                    <div class="row g-0 " style="height:100%;">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/background/wall1.jpg'); background-size: cover;">

                            <div class="edit_pro_img">
                                <label for="update_pic">
                                    <img src="{{ URL::to('/') }}/pictures/{{ $data['Profile_Pic'] }}" class="pro_img">
                                </label>
                                <form action="update_pro_pic" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="update_pic" name="profile_pic" oninput="update()">
                                    @error('profile_pic')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-primary" id="update_btn">Update picture</button>

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
                                        <p class="text-muted" style="margin-bottom: 30px;">{{ $data['Username'] }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted" style="margin-bottom: 30px;">{{ $data['Email'] }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{ $data['Mobile_No'] }}</p>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted">{{ $data['Gender'] }}</p>
                                    </div>
                                </div>
                                <div style="width: 50%">
                                    <div class="row" id="pro_button" style="text-align:center;">
                                        <div class="col-4 mb-3">
                                            <a href="{{ URL::to('/') }}/admin_profile_edit">
                                                <input type="button" value="Edit" class="submit" style="background-color: #6d90f9">
                                            </a>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="button" class="btn" role="button" aria-pressed="true"
                                                data-toggle="modal" data-target="#delete_acc" value="Delete" style="background-color: #dd7973"></input>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="button" value="Change Password" data-toggle="modal"
                                                data-target="#exampleModalCenter" class="reset" style="background-color: #22f2da">
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

{{-- delete account  --}}
<div class="modal fade" id="delete_acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Conform its You</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="admin_profile_delete" method="post">
                @csrf
                <div class="modal-body">
                    <label for="inputPasswordOld">Enter Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Delete" class="btn btn-primary" name="delete">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- change password  --}}

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
            </div>
            <form action="change_password" method="post" onsubmit="return validate()">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Current Password" name="opwd">
                    </div>
                    <div class="form-group">
                        <label for="npwd1">New password</label>
                        <input type="password" class="form-control" id="npwd1" placeholder="Enter New Password"
                            name="npwd">
                        <small style="color: red" id="errornpwd"></small>
                    </div>
                    <div class="form-group">
                        <label for="cpwd1">Confirm Password</label>
                        <input type="password" class="form-control" id="cpwd1" placeholder="Confirm Password"
                            name="cnpwd">
                        <small style="color: red" id="errorcpwd"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
                    <input type="submit" class="btn btn-primary" value="Save Change">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validate() {
        var npwd = document.getElementById('npwd1').value;
        var cpwd = document.getElementById('cpwd1').value;

        var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;


        if (passwordRegex.test(npwd)) {
            if (npwd === cpwd) {
                return true;
            } else {
                document.getElementById('errorcpwd').innerHTML = 'Confirm password does not matched';
                return false;
            }
            // console.log("true");
            return true;
        } else {
            document.getElementById('errornpwd').innerHTML =
                'Enter At least one digit (0-9), one lowercase letter (a-z), one uppercase letter (A-Z), Minimum length of 8 characters';
            // console.log("false");
            return false;
        }
    }
</script>
