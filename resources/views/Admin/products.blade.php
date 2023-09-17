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

        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        <a href="products_add">
                            <button class="button-70">Add Product</button>
                        </a>
                    </th>
                    <th colspan="8">Products</th>
                </tr>
            </thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Photo
                </th>
                <th>
                    Product Name
                </th>
                <th>
                    Description
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Category
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
                <th>
                    Status
                </th>
            </tr>


            <tr>
                <td>
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg">
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
                    <a href="{{ URL::to('/') }}/edit_registration/"><button id="action" class="edit">Edit</button></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/"><button id="action" class="delete">Delete</button></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/deactivate_user/"><button id="action" class="deactivate">Deactivate</button></a>

                    <!-- <a href="{{ URL::to('/') }}/activate_user/"><input type="button" value="Activate"></a>
                
                <a href="{{ URL::to('/') }}/reactivate_user/"><input type="button" value="Reactivate"></a> -->

                </td>
            </tr>
        </table>


    </main>
    @endsection
</body>

</html>