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
            <div class="container-fluid">
                <div class="row">
                    <div class="col headers">
                        <h1>Total Users</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col header-btn">
                        <a href="movie_add">
                            <button class="button-70">Add Movie</button>
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
                        Movie Name
                    </th>
                    <th>
                        Release Date
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Tickets
                    </th>
                    <th>
                        Price of Ticket
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
                            {{ $movie['Movie_ID'] }}
                        </td>
                        <td style="text-align: center;">
                            <img src="{{ URL::to('/') }}/pictures/movies/{{ $movie['pic'] }}">
                        </td>
                        <td>
                            {{ $movie['Movie_Name'] }}
                        </td>
                        <td>
                            {{ $movie['Release_Date'] }}
                        </td>
                        <td>
                            {{ $movie['Status'] }}
                        </td>
                        <td>
                            {{ $movie['available_tickets'] }}
                        </td>
                        <td>
                            {{ $movie['Price'] }}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/update_movie1/{{ $movie['Movie_ID'] }}"><button id="action"
                                    class="edit"><i class="bi bi-pencil-square"></i></button></a>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/delete_movies1/{{ $movie['Movie_ID'] }}"><button id="action"
                                    class="delete"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>


        </main>
    @endsection
</body>

</html>
