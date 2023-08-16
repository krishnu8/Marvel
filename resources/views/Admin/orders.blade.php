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

        <table>
            <thead>
                <tr>
                    <th colspan="2"><a href="order_add">Add Order</a></th>
                    <th colspan="12">Orders</th>
                </tr>
            </thead>
            <tr>
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
                <th>
                    Payment Status
                </th>
                <th colspan="2">
                    Operation
                </th>
            </tr>


            <tr>
                <td>
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="" height="80px" width="80px" style="border-radius: 50%;">
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
                <td>
                </td>
                <td>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/"><input type="button" value="Accept"></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/deactivate_user/"><input type="button" value="Cancel"></a>

                    <!-- <a href="{{ URL::to('/') }}/activate_user/"><input type="button" value="Activate"></a>
                
                <a href="{{ URL::to('/') }}/reactivate_user/"><input type="button" value="Reactivate"></a> -->

                </td>
            </tr>
        </table>


    </main>
    @endsection
</body>

</html>