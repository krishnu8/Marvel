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
                <h1>Add Products</h1>
                <form class="user_add" action="product_controller" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <input type="text" name="pro_name" placeholder="Product Name" id="pro_name1"
                                class="form-control">
                            @error('pro_name')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <!-- <input type="text" name="rt" placeholder="Description" id="rt1" class="form-control"> -->
                            <textarea name="pro_des" class="form-control style="width: 100%; background-color: transparent; border: 2px solid black;" rows="5" placeholder="Description"></textarea>
                            @error('pro_des')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col">
                            <select class="form-select" name="category" style="border: 1px solid black;">
                                <option disabled selected>Category</option>
                                <option value="clothing">clothing</option>
                                <option value="cosplay">cosplay</option>
                                <option value="Toy">Toy</option>
                                <option value="accessories">accessories</option>
                                <option value="collection">collection</option>
                            </select>
                            @error('category')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" name="qty" placeholder="Quantity" id="qty1" class="form-control">
                            @error('qty')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="price" placeholder="Price" id="price1" class="form-control">
                            @error('price')
                                <span style="color: red;">{{ $message }}</span> <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img src="" alt="">
                            <input type="file" name="pro_pic" id="pro_pic1" class="form-control">
                            @error('pro_pic')
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
