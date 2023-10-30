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
                    <h1>Upcoming Movies</h1>
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
                    Run-time
                </th>
                <th>
                    Release Date
                </th>
                <th>
                    Status
                </th>
            </tr>

            @foreach ($upcomingMovies as $movie)

            <tr>
                <td>
                    {{$movie['Movie_ID']}}
                </td>
                <td style="text-align: center;">
                    {{-- <img src="{{ URL::to('/') }}/pictures/wall.jpg"> --}}
                    <img src="{{ URL::to('/') }}/pictures/movies/{{ $movie['pic'] }}">
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
            </tr>
            @endforeach
        </table>


    </main>
    @endsection
</body>

</html>
