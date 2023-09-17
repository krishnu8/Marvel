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

        <table>
            <thead>
                <th colspan="9">Review & Rating</th>
                </tr>
            </thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Product Image
                </th>
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
                    Date
                </th>
                <th>
                    Delete
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
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/">
                        <button id="action" class="delete">Delete</button>
                    </a>
                </td>
            </tr>
        </table>


    </main>
    @endsection
</body>

</html>