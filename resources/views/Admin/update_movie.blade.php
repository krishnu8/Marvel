<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @extends('Admin/master_view')
    @section('content')

    <main class="mt-5 pt-3">

        <div class="container col-4">
            <form method="POST" enctype="multipart/form-data" action="{{ URL::to('/') }}/update_movie">
                @csrf
                <div class="form-group">
                    <label for="mn1">Movie Name</label>
                    <input type="text" id="mn1" name="mn" class="form-control" placeholder="Enter name"
                        value="{{ $movies['Movie_Name'] }}">
                    @error('mn')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rt1">Runtime</label>
                    <input type="time" id="rt1" name="rt" class="form-control" placeholder="Enter email"
                        style="border: 1px solid black" value="{{ $movies['Release_Date'] }}">
                        @error('rt')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rd">Release_Date</label>
                    <input type="date" id="em1" name="rd" class="form-control" placeholder="Enter email"
                        style="border: 1px solid black" value="{{ $movies['Release_Date'] }}">
                        @error('rd')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status1">Status</label></label>
                    <input type="tel" id="status1" name="status" class="form-control" placeholder="Enter number"
                        style="border: 1px solid black" value="{{ $movies['Status'] }}">
                    @error('status')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pic1">Select Picture</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="pic1" name="pic">
                        </div>
                    </div>
                    @error('pic')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="reset">
                </div>

            </form>
        </div>
    </main>
@endsection
</body>
</html>
