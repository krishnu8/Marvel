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
        <center class="cont_add">
        <h1>Add Upcoming Movie</h1>
            <form class="user_add" action="upcom_movie_controller" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <input type="text" name="mn" placeholder="Movie Name" id="mn1" class="form-control">
                        @error('mn')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="rt" placeholder="Run Time" id="rt1" class="form-control">
                        @error('rt')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="rd" placeholder="Release Date" id="rd1" class="form-control">
                        @error('rd')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="" alt="">
                        <input type="file" name="movie_pic" id="movie_pic1" class="form-control">
                        @error('movie_pic')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div class="col">
                        <input type="submit" value="Submit" name="btn-submit" class="submit">

                        <input type="reset" value="Reset" name="btn-message" class="reset">
                    </div>
                </div>
            </form>
        </center>
    </main>
    @endsection
</body>

</html>
