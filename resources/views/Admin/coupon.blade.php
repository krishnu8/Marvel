<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col headers">
                        <h1>Coupons</h1>
                    </div>
                </div>
                <div class="row bg-info">
                    <div class="col header-btn">
                        <a href="addCoupon">
                            <button class="button-70">Add Coupon</button>
                        </a>
                    </div>
                </div>
            </div>
            <table>
                <tr style="height: 50px">
                    <th>
                        Coupon ID
                    </th>
                    <th>
                        Coupon
                    </th>
                    <th>
                        Discount Amount
                    </th>
                    <th>
                        Minimum Price
                    </th>
                    <th>
                        Expiry date
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>

                @foreach ($coupons as $c)
                    <tr>
                        <td>
                            {{ $c['Offer_ID'] }}
                        </td>
                        <td>
                            {{ $c['Coupon'] }}
                        </td>
                        <td>
                            {{ $c['Discount_amount'] }}
                        </td>
                        <td>
                            {{ $c['Minimum_Price'] }}
                        </td>
                        <td>
                            {{ $c['Expiry_Date'] }}
                        </td>
                        <td>
                            {{ $c['Status'] }}
                        </td>
                        {{-- <td>
                    {{$product['category_id']}}
                </td> --}}
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/delete_coupon/{{ $c['Offer_ID'] }}"><button
                                    id="action" class="delete"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
