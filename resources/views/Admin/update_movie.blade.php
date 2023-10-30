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

            <div class="container-fluid">
                <div class="row">
                    <div class="col headers">
                        <h1>Update Movie</h1>
                    </div>
                </div>
            </div>
            <div class="container col-4">
                <form method="POST" enctype="multipart/form-data" action="{{ URL::to('/') }}/update_movie">
                    @csrf
                    <input type="text" name="m_id" value="{{ $movies['Movie_ID'] }}" hidden>
                    <div class="form-group">
                        <label for="mn1">Movie Name</label>
                        <input type="text" id="mn1" name="mn" class="form-control" placeholder="Enter name"
                            value="{{ $movies['Movie_Name'] }}">
                        @error('mn')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="rt1">Runtime</label>
                        <input type="time" id="rt1" name="rt" class="form-control" placeholder="Enter email"
                            style="border: 1px solid black" value="{{ $movies['Run_Time'] }}">
                        @error('rt')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="rd1">Release_Date</label>
                        <input type="date" id="rd1" name="rd" class="form-control" placeholder="Enter email"
                            style="border: 1px solid black" value="{{ $movies['Release_Date'] }}">
                        @error('rd')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status1">Status</label>
                        <select class="form-select" id="status1" name="status">
                            @if ($movies['Status'] == 'Deleted')
                                <option value="Deleted" selected>Deleted</option>
                            @elseif ($movies['Status'] == 'Upcoming')
                                <option value="Upcoming" selected>Upcoming</option>
                            @else
                                <option value="Available">Available</option>
                            @endif
                        </select>

                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="tkt1">No. of Tickets</label>
                            <input type="number" name="tkt" id="tkt1" value="{{ $movies['available_tickets'] }}"
                                class="form-control">
                            @error('tkt')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="pr1">Price</label>
                            <input type="number" name="pr" value="{{ $movies['Price'] }}" id="pr1"
                                class="form-control">
                            @error('pr')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
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
                        <input type="submit" value="Update">
                    </div>

                </form>
            </div>
        </main>
    @endsection
</body>

</html>
