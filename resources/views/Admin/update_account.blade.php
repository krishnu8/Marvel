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
        <form>

            <div class="form-group">
              <label for="un1">Name</label>
              <input type="text" id="un1" name="un" class="form-control" placeholder="Enter name">
              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="em1">Email address</label>
                <input type="email" id="em1" name="em" class="form-control" placeholder="Enter email" style="border: 1px solid black">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="mob1">Phone Number</label>
                <input type="tel" id="mob1" name="mob" class="form-control" placeholder="Enter number" style="border: 1px solid black">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="pwd1">Password</label>
<input type="password" id="pwd1" name="pwd" class="form-control" placeholder="Enter Password">
<small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
</small>
              </div>

              
              <div class="form-group">
                <label for="conf_pwd">Confirm Password</label>
<input type="password" id="conf_pwd" name="pwd_confirmation" class="form-control" placeholder="Enter Password">
<small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
</small>
              </div>
              
              
              <div class="form-group">
                <label >Gender</label>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="gender">Female
                    </label>
                  </div>
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label >Role</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                    {{-- <option selected>Open this select menu</option> --}}
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>   
            </div>
              
              <div class="form-group">
                <label for="profile1">Select Profile Picture</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="profile1">
                    </div>
                  </div>
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <input type="button" value="Change Password" class="reset">
            </div>
            
          </form>
    </main>
    @endsection
</body>

</html>