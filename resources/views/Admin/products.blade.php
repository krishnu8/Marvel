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
                        <th colspan="3">
                            <a href="products_add">
                                <button class="button-70">Add Product</button>
                            </a>
                        </th>
                        <th colspan="6">Products</th>
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
                            {{ $product['product_id'] }}
                        </td>
                        <td style="text-align: center;">
                            <img src="{{ URL::to('/') }}/pictures/products/{{ $product['product_image'] }}">
                        </td>
                        <td>
                            {{ $product['product_name'] }}
                        </td>
                        <td style="padding: 10px">
                            <div  style="height:100px; overflow-y: scroll; word-break: break-all" >
                                {{ $product['product_desc'] }}
                            </div>
                        </td>
                        <td>
                            {{ $product['Quantity'] }}
                        </td>
                        <td>
                            {{ $product['price'] }}
                        </td>
                        <td>
                            {{ $product['deleted'] }}
                        </td>
                        {{-- <td>
                    {{$product['category_id']}}
                </td> --}}
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/update_product1/{{ $product['product_id'] }}"><button
                                    id="action" class="edit"><i class="bi bi-pencil-square"></i></button></a>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/delete_product1/{{ $product['product_id'] }}"><button
                                    id="action" class="delete"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
