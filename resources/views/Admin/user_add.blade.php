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

            <form class="user_add" action="form_controller" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Register</h1>
                <div class="row">
                    <div class="col">
                        <input type="text" name="un" placeholder="Username" id="un1" class="form-control">
                        @error('un')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="em" placeholder="Email" id="em1" class="form-control">
                        @error('em')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="mob" placeholder="Mobile" id="mob1" class="form-control">
                        @error('mob')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="pwd" placeholder="Password" id="pwd1" class="form-control">
                        @error('pwd')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="pwd_confirmation" placeholder="Confirm Password" id="pwd_confirmation1" class="form-control">
                        @error('pwd_confirmation')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col gen">
                        <input type="radio" name="gen" value="M"> Male
                        <input type="radio" name="gen" value="F"> Female <br>
                        @error('gen')
                        <span style="color: red;">{{$message}}</span>
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
