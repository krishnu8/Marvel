@extends('layouts.After_header')
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
                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/background/wall1.jpg'); background-size: cover;">

                        <img src="pictures/doctor strange.jpg" alt="Avatar" class="img-fluid my-5"
                            style="width: 170px; height:170px; border-radius:50%" />

                        <label for="image1"><img src="pictures/Edit_icon.png" alt="" class="editt"></label>
                        <h2>Krishnu Gupta</h2>
                        <center>
                            <hr class="hh">
                        </center>
                        <p>User</p>
                        <i class="far fa-edit mb-5"></i>
                        <form action="update_profile_pic" method="post">
                            @csrf
                            <input type="file" name="" oninput="update()" id="image1" style="display: none" name="pic">
                            <span style="color: red">
                                @error('pic')
                                    {{$message}}
                                @enderror
                            </span>
                            <center><button type="submit" class="btn btn-info" id="update_btn">Update picture</button>
                            </center> <br>
                        </form>
                        <a href="Edit" class="btn btn-secondary">Edit Profile</a><br> <br>
                        <a href="change_password" class="btn btn-secondary">Change Password</a><br> <br>

                        {{-- <button type="button" class="btn btn-secondary" role="button" aria-pressed="true"
                            data-toggle="modal" data-target="#cppp">Change password</button> <br> <br> --}}

                        {{-- <a href="" class="btn btn-Danger" onclick="return confirm('Are you Sure! You Want To Delete Your Account')">Delete Account</a> --}}
                        <button type="button" class="btn btn-danger" role="button" aria-pressed="true" data-toggle="modal"
                            data-target="#delete_acc">Delete Account</button>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6>Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted">lilludon@neoda.com</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Phone</h6>
                                    <p class="text-muted">123 456 789</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Hobbies</h6>
                                    <div class="text-muted">Dancing</div>
                                    <div class="text-muted">Singing</div>
                                    <div class="text-muted">Watching Reels</div>
                                    <div class="text-muted">Pooping</div>
                                </div>
                            </div>
                            <h6>Projects</h6>
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi molestias excepturi labore
                                ratione suscipit dolorum animi voluptatem ut, placeat numquam necessitatibus libero officiis
                                delectus vel! Quidem facere cumque fugit voluptas!
                            </div>
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
 


    {{-- delete account modle  --}}
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
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="inputPasswordOld">Enter Password</label>
                        <input type="password" class="form-control" id="inputPasswordOld" required=""
                            name="ppass">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Delete" class="btn btn-primary" name="delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
