<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

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
            <div class="container-fluid bg-light">
                <div class="row">
                    <div class="col headers">
                        <h1>Orders</h1>
                    </div>
                </div>
                <div class="row bg-info">
                    <div class="col header-btn">
                        <a href="order_add">
                            <button class="button-70">Add Order</button>
                        </a>
                    </div>
                </div>
            </div>
            <table>
                <tr style="height: 50px">

                    <th>
                        Order Id
                    </th>
                    <th>
                        Pro Id
                    </th>
                    <th>
                        Product Image
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Pro Price
                    </th>
                    <th>
                        Pro Quantity
                    </th>
                    <th>
                        User Id
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                        Discount Amount
                    </th>
                    <th>
                        Price After Disc.
                    </th>
                    <th>
                        Order Status
                    </th>
                    <th colspan="2">
                        Operation
                    </th>
                </tr>

                @foreach ($product_details as $product)
                    @foreach ($orders as $ord)
                        @if ($product['Product_id'] == $ord['Product_id'])
                            <tr>
                                <td>
                                    {{ $ord['Order_id'] }}
                                </td>
                                <td>
                                    {{ $ord['Product_id'] }}
                                </td>
                                <td style="text-align: center;">
                                    <img src="{{ URL::to('/') }}/pictures/products/{{ $product['Image'] }}">
                                </td>
                                <td>
                                    {{ $product['Product_name'] }}
                                </td>
                                <td>
                                    {{ $ord['Price'] }}
                                </td>
                                <td>
                                    {{ $ord['Quantity'] }}
                                </td>
                                <td>
                                    {{ $ord['Price'] * $ord['Quantity'] }}
                                </td>
                                <td>
                                    {{ $ord['User_id'] }}
                                </td>
                                <td>
                                    {{ $ord['Discount_Amount'] }}
                                </td>
                                <td>
                                    {{ $ord['Price'] * $ord['Quantity'] - $ord['Discount_Amount'] }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $ord['Delivery_status'] }}
                                </td>
                                @if ($ord['Delivery_status'] == 'Pending')
                                    <td style="text-align: center;">
                                        <a href="{{ URL::to('/') }}/complete_ord1/{{ $ord['Order_id'] }}"><button
                                                id="action" class="activate">Complete</button></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ URL::to('/') }}/cancel_ord1/{{ $ord['Order_id'] }}/{{ $ord['Quantity'] }}/{{ $ord['Product_id'] }}"><button id="action"
                                                class="delete">Cancel</button></a>
                                    </td>
                                @elseif ($ord['Delivery_status'] == 'Cancelled')
                                <td colspan="2" style="text-align: center;">
                                    <a href="{{ URL::to('/') }}/reorder1/{{ $ord['Order_id'] }}/{{ $ord['Quantity'] }}/{{ $ord['Product_id'] }}"><button id="action"
                                            class="delete" style="background-color: rgb(84, 173, 245);">Reorder</button></a>
                                </td>
                                @else
                                    <td colspan="2" style="text-align: center;">
                                        <a href="{{ URL::to('/') }}/delete_ord1/{{ $ord['Order_id'] }}"><button id="action"
                                                class="delete" style="background-color: rgb(129, 20, 20); color: aliceblue;">Delete Record</button></a>
                                    </td>
                                @endif




                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
