<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review & Rating</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col headers">
                    <h1>Review & Rating</h1>
                </div>
            </div>
        </div>
        <table>
            <tr style="height: 50px">
                <th>
                    Id
                </th>
                {{-- <th>
                    Product Image
                </th> --}}
                <th>
                    Product Id
                </th>
                <th>User Id</th>
                <th>
                    Rating
                </th>
                <th>
                    Review
                </th>
                <th>
                    Deleted
                </th>

                <th>
                    Delete
                </th>
            </tr>

            @foreach ($review as $rating)
            <tr>
                <td>
                    {{$rating['Rating_id']}}
                </td>
                {{-- <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="" height="80px" width="80px" style="border-radius: 50%;">
                </td> --}}
                <td>
                    {{$rating['Product_id']}}
                </td>
                <td>
                    {{$rating['User_id']}}
                </td>
                <td>
                    {{$rating['Rating']}}
                </td>
                <td>
                    {{$rating['Description']}}
                </td>
                <td>
                    {{$rating['deleted']}}
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_rating1/{{$rating['Rating_id']}}">
                        <button id="action" class="delete"><i class="bi bi-trash"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>


    </main>
    @endsection
</body>

</html>
