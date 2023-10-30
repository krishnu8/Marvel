<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        @if (session('error'))
                <script>
                    swal({
                        title: "Sorry!",
                        text: "{{ session('error') }}",
                        icon: "warning",
                        button: "OK",
                    });
                </script>
            @endif

            @if (session('succ'))
                <script>
                    swal({
                        title: "Congratulations!",
                        text: "{{ session('succ') }}",
                        icon: "success",
                        button: "OK",
                    });
                </script>
            @endif
        <section class="checkout-orders">
            <form action="{{ URL::to('/') }}/order_controller_route" method="post">
                @csrf
                <h3>Place your orders</h3>

                <div class="flex">
                    <div class="inputBox">
                        <span>User Id:</span>
                        <input type="text" name="uid"  placeholder="Enter your name" class="form-control name" maxlength="20" value="{{ old('uid') }}" />
                        @error('uid')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="inputBox">
                        <span>Product Id:</span>
                        <input type="number" name="pro_id" placeholder="enter your number" class="form-control number" min="0" max="9999999999" style="border: 1px solid black;" value="{{ old('pro_id') }}" />
                        @error('pro_id')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="inputBox">
                        <span>Product Quantity :</span>
                        <input type="number" name="pro_qty" placeholder="enter product quantity" class="form-control" style="border: 1px solid black;" value="{{ old('uid') }}"/>
                        @error('pro_qty')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" name="ord" class="update-btn btn btn-secondary btn-lg btn-block" id="smb-btb">
                    Order Now
                </button>
            </form>
        </section>
    </main>
    @endsection
</body>

</html>
