<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Movies</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">

        <table>
            <thead>
                <tr>
                    <th colspan="2"><a href="movies_add_upcom">Add Movie</a></th>
                    <th colspan="7">Upcoming Movies</th>
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
                    Movie Name
                </th>
                <th>
                    Run-time
                </th>
                <th>
                    Date
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
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="" height="80px" width="80px" style="border-radius: 50%;">
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/edit_registration/"><input type="button" value="Edit"></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/"><input type="button" value="Delete"></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/deactivate_user/"><input type="button" value="Deactivate"></a>

                    <!-- <a href="{{ URL::to('/') }}/activate_user/"><input type="button" value="Activate"></a>
                
                <a href="{{ URL::to('/') }}/reactivate_user/"><input type="button" value="Reactivate"></a> -->

                </td>
            </tr>
        </table>


    </main>
    @endsection
</body>

</html>