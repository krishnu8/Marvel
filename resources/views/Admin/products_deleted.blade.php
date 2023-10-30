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
            <div class="container-fluid">
                <div class="row">
                    <div class="col headers">
                        <h1>Deleted Products</h1>
                    </div>
                </div>
            </div>
            <table>
                <tr style="height: 50px">
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
                        Price
                    </th>
                </tr>

                @foreach ($del_product as $del_pro)
                    <tr>
                        <td>
                            {{ $del_pro['Product_id'] }}
                        </td>
                        <td style="text-align: center;">
                            <img src="{{ URL::to('/') }}/pictures/products/{{ $del_pro['Image'] }}">
                        </td>
                        <td style="padding: 10px">
                            <div style="height:100px; overflow-y: scroll; word-break: break-all">
                                {{ $del_pro['Product_name'] }}
                            </div>
                        </td>
                        <td>
                            {{ $del_pro['Price'] }}
                        </td>
                    </tr>
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
