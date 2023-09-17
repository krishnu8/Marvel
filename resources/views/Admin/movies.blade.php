<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">

        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        <a href="movie_add">
                            <button class="button-70">Add Movie</button>
                        </a>
                    </th>
                    <th colspan="7">Movies</th>
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
                    Release Date
                </th>
                <th>
                    Status
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
                    
                </td>
                <td>
                    {{$movie['Release_Date']}}
                </td>
                <td>
                    {{$movie['Status']}}
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/edit_registration/"><button id="action" class="edit">Edit</button></a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_registration/"><button id="action" class="delete">Delete</button></a>
                </td>
            </tr>   
            @endforeach
        </table>


    </main>
    @endsection
</body>

</html>