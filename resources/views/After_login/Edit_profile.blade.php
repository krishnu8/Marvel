@extends('layouts.after_login_master')
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }

    #ho {
        display: none;
    }

    .hh {
        background-color: green;
        width: 80%;
        height: 1px;
    }

    .editt {
        height: 80px;
        width: 80px;
        z-index: 1;
        top: 130px;
        left: 245px;
        position: absolute;
        cursor: pointer;
        opacity: 0;
    }

    .editt:hover {
        opacity: 1;
    }

    #update_btn {
        display: none;
    }
</style>


<body>
    @section('body')
        <section class="vh-100" style="background-color: #f4f5f7; z-index:-1;">
            <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                <div class="row g-0 " style="height:100%;">
                    <div
                        class="col-md-4 gradient-custom text-center text-white"style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                        <img src="pictures/doctor strange.jpg" alt="Avatar" class="img-fluid my-5"
                            style="width: 170px; height:170px; border-radius:50%" />

                        <label for="image1"><img src="pictures/Edit_icon.png" alt="" class="editt"></label>
                        <h2>Krishnu Gupta</h2>
                        <center>
                            <hr class="hh">
                        </center>
                        <p>User</p>
                        <i class="far fa-edit mb-5"></i>
                        {{-- <form action="" method="get">
                            <input type="file" name="" oninput="update()" id="image1" style="display: none">
                            <center><button type="submit" class="btn btn-info" id="update_btn">Update picture</button></center> <br>
                        </form>
                        <a href="Edit" class="btn btn-secondary">Edit Profile</a><br> <br>
                        <button type="button" class="btn btn-secondary" role="button" aria-pressed="true" data-toggle="modal" data-target="#cppp">Chnage password</button> <br> <br>
                        <a href="" class="btn btn-Danger" onclick="return confirm('Are you Sure! You Want To Delete Your Account')">Delete Account</a> --}}
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <form action="" method="get">

                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        {{-- <p class="text-muted">lilludon@neoda.com</p> --}}
                                        <input type="email" name="" id="" class="text-muted">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        {{-- <p class="text-muted">123 456 789</p> --}}
                                        <input type="number" name="" id="" class="text-muted">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Hobbies</h6>
                                        {{-- <div class="text-muted">Dancing</div>
                                        <div class="text-muted">Singing</div>
                                        <div class="text-muted">Watching Reels</div>
                                        <div class="text-muted">Pooping</div> --}}
                                        <input type="checkbox" name="" id="">Dancing
                                        <input type="checkbox" name="" id="">Singing
                                        <input type="checkbox" name="" id="">Watching Movies
                                        <input type="checkbox" name="" id="">Playing Video Game
                                        <input type="checkbox" name="" id="">Making Reels
                                    </div>
                                </div>
                                {{-- <h6>Projects</h6> --}}
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Recent</h6>
                                        <p class="text-muted">Nothing to show</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Most Viewed</h6>
                                        <p class="text-muted">Berojgaar</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                                <h6>Description</h6>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi molestias excepturi
                                    labore
                                    ratione suscipit dolorum animi voluptatem ut, placeat numquam necessitatibus libero
                                    officiis
                                    delectus vel! Quidem facere cumque fugit voluptas!
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    <script>
        function update() {
            document.getElementById("update_btn").style.display = "block";
        }
    </script>



    {{-- change password model  --}}
    <div class="modal fade" id="cppp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="user_change_password_action.php" method="post">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Chnage Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Current
                                Password</label>
                            <input type="password" id="orangeForm-name" class="form-control" required name="cp1">
                            <p id="checkpasserr" style="color:red;"></p>

                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-email">New Pasword</label>
                            <input type="password" id="pass" class="form-control ">
                            <p id="passerr" style="color:red;"></p>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">verify</label>
                            <input type="password" name="pass1" id="cpass" required class="form-control"
                                onblur="check2()">
                            <p id="cpasserr" style="color:red;"></p>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" value="Change" name="change" style="width:100px;" class="btn-custom">
                    </div>
                </div>
            </form>
        </div>
    </div>
