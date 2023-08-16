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
        <center class="cont_add">
        <h1>Add Products</h1>
            <form class="user_add" action="product_controller" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col">
                        <input type="text" name="pro_name" placeholder="Product Name" id="pro_name1" class="form-control">
                        @error('pro_name')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- <input type="text" name="rt" placeholder="Description" id="rt1" class="form-control"> -->
                        <textarea name="pro_des" cols="41" rows="5" placeholder="Description"></textarea>
                        @error('pro_des')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="qty" placeholder="Quantity" id="qty1" class="form-control">
                        @error('qty')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="cat" placeholder="Category" id="cat1" class="form-control">
                        @error('cat')
                        <span style="color: red;">{{$message}}</span> <br>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="" alt="">
                        <input type="file" name="pro_pic" id="pro_pic1" class="form-control">
                        @error('pro_pic')
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