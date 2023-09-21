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

    @if (session('error'))
            <div class="alert alert-Danger alert-dismissible fade show" role="alert"
                style="min-width: 500px; right: 20px; top: 100px; z-index:1; position: absolute;">
                {{ session('error') }}
            </div>
            <script>
                // Automatically close the alert after 5 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 3000);
            </script>
        @endif

        <section class="vh-100" style="background-color: #f4f5f7; z-index:-1;">
            <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                <div class="row g-0 " style="height:100%;">
                    <div
                        class="col-md-4 gradient-custom text-center text-white"style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/background/wall1.jpg'); background-size: cover;">

                        <img src="pictures/doctor strange.jpg" alt="Avatar" class="img-fluid my-5"
                            style="width: 170px; height:170px; border-radius:50%" />

                        <label for="image1"><img src="pictures/Edit_icon.png" alt="" class="editt"></label>
                        <h2>{{ $data['Username'] }}</h2>
                        <center>
                            <hr class="hh">
                        </center>
                        <p>User</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <form action="pass_validate" method="get">

                                <h3>Change Password</h3>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Your Password</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Password"  name="pwd">
                                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">
                                                @error('pwd')
                                                    {{$message}}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter New password"  name="cpwd">
                                                <small id="emailHelp" class="form-text text-muted" style="color: red !important;">
                                                    @error('cpwd')
                                                        {{$message}}
                                                    @enderror
                                                </small>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Same as above"  name="ccpwd">
                                                <small id="emailHelp" class="form-text text-muted" style="color: red !important;">
                                                    @error('ccpwd')
                                                        {{$message}}
                                                    @enderror
                                                </small>
                                        </div>
                                    </div>

                                </div>
                                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Change Password</button>
                                        <button type="reset" class="btn btn-secondary" style="margin-top: 20px; margin-left: 10px;">Reset</button>
                                        <a href="After_profile" class="btn btn-danger" style="margin-top: 20px; margin-left: 10px;">Cancle</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
