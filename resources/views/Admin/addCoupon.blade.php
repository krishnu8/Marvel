<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
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
            <center class="pro__add">
                <h1>Add Coupon</h1>
                <form class="user_add" action="add_coupon" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="coupon" placeholder="Coupon" id="coupon1"
                                class="form-control" >
                            @error('coupon')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="dis" placeholder="Discount Amount" id="dis1" class="form-control">
                            @error('dis')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="price" placeholder="Minimum Price" id="price1" class="form-control">
                            @error('price')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Expiry Date
                            <input type="date" name="date" id="date1" class="form-control" >
                            @error('date')
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
