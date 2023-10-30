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
                        Total Price
                    </th>
                    <th>
                        User Id
                    </th>
                    <th>
                        Address1
                    </th>
                    <th>
                        Address2
                    </th>
                    <th>
                        Mobile
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Order Status
                    </th>
                    <th colspan="2">
                        Operation
                    </th>
                </tr>

                @foreach ($order as $ord)
                    @foreach ($product_detail as $product)
                        @if ($product['Product_id'] == $ord['Product_id'])
                            <tr>
                                <td>
                                    {{ $ord['Product_id'] }}
                                </td>
                                <td style="text-align: center;">
                                    <img src="{{ URL::to('/') }}/pictures/wall.jpg">
                                </td>
                                <td>
                                    {{ $product['Product_name'] }}
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td style="text-align: center;">
                                    {{-- <a href="{{ URL::to('/') }}/delete_registration/"><button id="action" class="edit">Accept</button></a> --}}
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ URL::to('/') }}/deactivate_user/"><button id="action"
                                            class="delete">Complete</button></a>

                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ URL::to('/') }}/deactivate_user/"><button id="action"
                                            class="delete">Cancel</button></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
