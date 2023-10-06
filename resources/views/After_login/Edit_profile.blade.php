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
                            <form action="Update_profile" method="get">

                                <h3>Information</h3>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Name"
                                                value="{{ $data['Username'] }}" name="Name">
                                            <small id="emailHelp" class="form-text text-muted"
                                                style="color: red !important;">
                                                @error('Name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter email"
                                                value="{{ $data['Email'] }}" name="Email">
                                            <small id="emailHelp" class="form-text text-muted"
                                                style="color: red !important;">
                                                @error('Email')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Number</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Number"
                                                value="{{ $data['Mobile_No'] }}" name="Number">
                                            <small id="emailHelp" class="form-text text-muted"
                                                style="color: red !important;">
                                                @error('Number')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-check">
                                            Gender: <br>
                                            <input class="form-check-input" type="radio" name="Gender"
                                                id="flexRadioDefault1" value="Male"
                                                {{ $data['Gender']== 'Male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Gender"
                                                id="flexRadioDefault2" value="Female"
                                                {{ $data['Gender'] == 'Female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">
                                            @error('Gender')
                                                {{ $message }}
                                            @enderror
                                        </small>

                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <h6>Description</h6>
                                <div style="margin-top: 30px;">
                                    <textarea name="bio" id="" cols="110" rows="5">{{ $data['Bio'] }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 20px">Update</button>
                                <button type="reset" class="btn btn-secondary"
                                    style="margin-top: 20px; margin-left: 10px;">Reset</button>
                                <a href="After_profile" class="btn btn-danger"
                                    style="margin-top: 20px; margin-left: 10px;">Cancle</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
        