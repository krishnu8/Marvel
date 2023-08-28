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
                                <input type="text" name="fn" value="" id="fn1" class="form-control">
                                @error('fn')
                                <span style="color: red;">{{$message}}</span> <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Mobile:</b>
                                <input type="text" name="mob" value="" id="mob1" class="form-control">
                                @error('mob')
                                <span style="color: red;">{{$message}}</span> <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>E-mail:</b>
                                <input type="text" name="em" value="" id="em1" class="form-control">
                                @error('em1')
                                <span style="color: red;">{{$message}}</span> <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Update" style="width: 95%">
                        </div>
                        <div class="row">
                            
                            <div class="col">
                                <a href="{{ URL::to('/') }}/admin_profile" style="width: 100%"><input type="button" value="Cancel"></a>

                                <input type="reset" value="Reset">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @endsection
</body>

</html>