<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col headers">
                        <h1>Add Movies</h1>
                    </div>
                </div>
            </div>
            <center class="cont_add">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
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

                @if (session('succ'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                        style="min-width: 500px; right: 20px; top: 100px; z-index:1; position: absolute;">
                        {{ session('succ') }}
                    </div>
                    <script>
                        // Automatically close the alert after 5 seconds
                        setTimeout(function() {
                            $('.alert').alert('close');
                        }, 3000);
                    </script>
                @endif
                <form class="movie_add" action="movie_controller" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="mn" placeholder="Movie Name" id="mn1" class="form-control"  value="{{ old('mn') }}">
                            @error('mn')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <input type="time" name="rt" placeholder="Run Time" id="rt1" class="form-control">
                            @error('rt')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <input type="date" name="rd" placeholder="Release Date" id="rd1" class="form-control"  value="{{ old('rd') }}">
                            @error('rd')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                                <option value="Upcoming" selected>Upcoming</option>
                                <option value="Deleted">Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="tkt" placeholder="No. of Tickets" id="tkt1" class="form-control"  value="{{ old('tkt') }}">
                            @error('tkt')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="pr" placeholder="Price of ticket" id="pr1" class="form-control"  value="{{ old('pr') }}">
                            @error('pr')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img src="" alt="">
                            <input type="file" name="movie_pic" id="movie_pic1" class="form-control">
                            @error('movie_pic')
                                <span style="color: red;">{{ $message }}</span> <br>
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
