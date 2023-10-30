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
                        <h1>Products</h1>
                    </div>
                </div>
                <div class="row bg-info">
                    <div class="col header-btn">
                        <a href="products_add">
                            <button class="button-70">Add Product</button>
                        </a>
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
                        Quantity
                    </th>
                    <th>
                        price
                    </th>
                    <th>
                        Deleted
                    </th>
                    {{-- <th>
                    Category
                </th> --}}
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product['Product_id'] }}
                        </td>
                        <td style="text-align: center;">
                            <img src="{{ URL::to('/') }}/pictures/products/{{ $product['Image'] }}">
                        </td>
                        <td style="padding: 10px">
                            <div  style="height:100px; overflow-y: scroll; word-break: break-all" >
                                {{ $product['Product_name'] }}
                            </div>
                        </td>
                        <td>
                            {{ $product['Quantity'] }}
                        </td>
                        <td>
                            {{ $product['Price'] }}
                        </td>
                        <td>
                            {{ $product['deleted'] }}
                        </td>
                        {{-- <td>
                    {{$product['category_id']}}
                </td> --}}
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/update_product1/{{ $product['Product_id'] }}"><button
                                    id="action" class="edit"><i class="bi bi-pencil-square"></i></button></a>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/delete_product1/{{ $product['Product_id'] }}"><button
                                    id="action" class="delete"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
