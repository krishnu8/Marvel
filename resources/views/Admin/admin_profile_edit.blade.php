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
                <h1>Update Admin Profile</h1>
                <div class="cont_add">
                    <form class="profile" action="{{ URL::to('/') }}/update_profile" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <b>Name:</b>
                                <input type="text" name="fn" value="{{ $data['Username'] }}" id="fn1"
                                    class="form-control">
                                @error('fn')
                                    <span style="color: red;">{{ $message }}</span> <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Mobile:</b>
                                <input type="text" name="mob" value="{{ $data['Mobile_No'] }}" id="mob1"
                                    class="form-control">
                                @error('mob')
                                    <span style="color: red;">{{ $message }}</span> <br>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="form-check">
                                    Gender: <br>
                                    <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1"
                                        value="Male" {{ $data['Gender'] == 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault2"
                                        value="Female" {{ $data['Gender'] == 'Female' ? 'checked' : '' }}>
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
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Update" style="width: 95%">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <a href="{{ URL::to('/') }}/admin_profile" style="width: 100%"><input type="button"
                                        value="Cancel"></a>

                                <input type="reset" value="Reset">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
</body>

</html>
