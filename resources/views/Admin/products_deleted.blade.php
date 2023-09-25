<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Products</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">

        <table>
            <thead>
                    <th colspan="7">Deleted Products</th>
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
                    Price
                </th>
                {{-- <th>
                    Status
                </th> --}}
            </tr>

            @foreach ($del_product as $del_pro)
            <tr>
                <td>
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/products/{{ $del_pro['product_image'] }}">
                </td>
                <td>
                    {{ $del_pro['product_name'] }}
                </td>
                <td style="padding: 10px">
                    <div  style="height:100px; overflow-y: scroll; word-break: break-all" >
                        {{ $del_pro['product_desc'] }}
                    </div>
                </td>
                <td>
                    {{ $del_pro['Quantity'] }}
                </td>
                <td>
                    {{ $del_pro['price'] }}
                </td>
                {{-- <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/deactivate_user/"><button id="action" class="edit">Reactivate</button></a>
                </td> --}}
            </tr>
            @endforeach
        </table>


    </main>
    @endsection
</body>

</html>
