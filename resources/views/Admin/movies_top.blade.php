<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Grossing Movies</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">

        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        <a href="movies_add_top">
                            <button class="button-70">Add Movie</button>
                        </a>
                    </th>
                    <th colspan="6">Top Grossing Movies</th>
                </tr>
            </thead>
            <tr style="height: 50px">
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
                    Total Gross
                </th>
                <th>
                    Run-time
                </th>
                <th>
                    Release Date
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </tr>

            @foreach ($movies1 as $movie)

            <tr>
                <td>
                    {{$movie['Movie_ID']}}
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg">
                </td>
                <td>
                    {{$movie['Movie_Name']}}
                </td>
                <td>
                    {{$movie['Total_Gross']}}
                </td>
                <td>
                    {{$movie['Movie_Name']}}
                </td>
                <td>
                    {{$movie['Release_Date']}}
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/edit_registration/"><button id="action" class="edit"><i class="bi bi-pencil-square"></i></button></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/"><button id="action" class="delete"><i class="bi bi-trash"></i></button></a>
                </td>
            </tr>
            @endforeach
        </table>


    </main>
    @endsection
</body>

</html>
