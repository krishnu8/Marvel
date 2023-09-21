<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
            <div class="container col-4">
            <form method="POST" enctype="multipart/form-data" action="{{ URL::to('/') }}/update_acc">
                @csrf
                <div class="form-group">
                    <label for="un1">Name</label>
                    <input type="text" id="un1" name="un" class="form-control" placeholder="Enter name"
                        value="{{ $data['Username'] }}">
                    @error('un')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="em1">Email address</label>
                    <input type="email" id="em1" name="em" class="form-control" placeholder="Enter email"
                        style="border: 1px solid black" readonly value="{{ $data['Email'] }}">
                </div>
                <div class="form-group">
                    <label for="mob1">Phone Number</label>
                    <input type="tel" id="mob1" name="mob" class="form-control" placeholder="Enter number"
                        style="border: 1px solid black" value="{{ $data['Mobile_No'] }}">
                    @error('mob')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd1">Password</label>
                    <input type="password" id="pwd1" name="pwd" class="form-control" placeholder="Enter Password"
                        value="{{ $data['Password'] }}">
                    @error('pwd')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="conf_pwd">Confirm Password</label>
                    <input type="password" id="conf_pwd" name="pwd_confirmation" class="form-control"
                        placeholder="Enter Password" value="{{ $data['Password'] }}">
                    @error('pwd_confirmation')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Gender</label>

                    @if ($data['Gender'] == 'Male')
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Male" checked>Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Female">Female
                            </label>
                        </div>
                    @endif

                    @if ($data['Gender'] == 'Female')
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Male">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Female" checked>Female
                            </label>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Role</label>
                    @if ($data['Role'] == 'Admin')
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                            <option value="Admin" selected>Admin</option>
                            <option value="User">User</option>
                        </select>
                    @else
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                            <option value="Admin">Admin</option>
                            <option value="User" selected>User</option>
                        </select>
                    @endif

                </div>

                <div class="form-group">
                    <label for="profile1">Select Profile Picture</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile1" name="pic">
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
