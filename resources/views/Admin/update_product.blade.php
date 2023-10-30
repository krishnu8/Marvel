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
                    <h1>Update Product</h1>
                </div>
            </div>
        </div>
        <div class="container col-4">
            <form method="POST" enctype="multipart/form-data" action="{{ URL::to('/') }}/update_pro">
                @csrf
                <input type="text" name="pro_id" value="{{ $pro['Product_id'] }}" hidden>
                <div class="form-group">
                    <label for="pn1">Movie Name</label>
                    <input type="text" id="pn1" name="pn" class="form-control"
                        value="{{ $pro['Product_name'] }}">
                    @error('pn')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pn1">Category</label>
                    <select class="form-select" name="category" style="border: 1px solid black;">
                        @if ($pro['Category'] == 'clothing')
                                <option value="clothing" selected>clothing</option>
                                <option value="cosplay">cosplay</option>
                                <option value="Toy">Toy</option>
                                <option value="accessories">accessories</option>
                                <option value="collection">collection</option>
                            @elseif ($pro['Category'] == 'cosplay')
                                <option value="cosplay" selected>cosplay</option>
                                <option value="clothing">clothing</option>
                                <option value="Toy">Toy</option>
                                <option value="accessories">accessories</option>
                                <option value="collection">collection</option>
                            @elseif ($pro['Category'] == 'Toy')
                                <option value="Toy" selected>Toy</option>
                                <option value="clothing">clothing</option>
                                <option value="cosplay">cosplay</option>
                                <option value="accessories">accessories</option>
                                <option value="collection">collection</option>
                            @elseif ($pro['Category'] == 'accessories')
                                <option value="accessories" selected>accessories</option>
                                <option value="clothing">clothing</option>
                                <option value="cosplay">cosplay</option>
                                <option value="Toy">Toy</option>
                                <option value="collection">collection</option>
                            @else
                                <option value="collection" selected>collection</option>
                                <option value="clothing">clothing</option>
                                <option value="cosplay">cosplay</option>
                                <option value="Toy">Toy</option>
                                <option value="accessories">accessories</option>
                            @endif
                    </select>
                    @error('category')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="p">Price</label>
                    <input type="number" id="p1" name="p" class="form-control"
                        style="border: 1px solid black" value="{{ $pro['Price'] }}">
                        @error('p')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="qty1">Quantity</label>
                    <input type="number" id="qty1" name="qty" class="form-control"
                        style="border: 1px solid black" value="{{ $pro['Quantity'] }}">
                        @error('qty')
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
