<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    @extends('Admin/master_view')
    @section('content')
        <main class="mt-5 pt-3">
            <div class="container-fluid bg-light">
                <div class="row">
                    <div class="col headers">
                        <h1>Tickets</h1>
                    </div>
                </div>
            </div>
            <table>
                <tr style="height: 50px">
                    <th>
                        Ticket Id
                    </th>
                    <th>
                        User Id
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                        Movie Id
                    </th>
                    <th>
                        Movie_picture
                    </th>
                    <th>
                        Ticket_date
                    </th>
                    <th>
                        Time
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>

                @if ($ticket->count() > 0)
                    @foreach ($ticket as $tkt)
                        <tr>
                            <td>
                                {{ $tkt['Ticket_id'] }}
                            </td>
                            {{-- <td style="text-align: center;">
                <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="" height="80px" width="80px" style="border-radius: 50%;">
            </td> --}}
                            <td>
                                {{ $tkt['User_id'] }}
                            </td>
                            <td>
                                {{ $tkt['Quantity'] }}
                            </td>
                            <td>
                                {{ $tkt['Price'] }}
                            </td>
                            <td>
                                {{ $tkt['Quantity'] * $tkt['Price'] }}
                            </td>
                            <td>
                                {{ $tkt['Movie_id'] }}
                            </td>
                            <td>
                                <img src="{{ URL::to('/') }}/pictures/movies/{{ $tkt['Movie_picture'] }}">
                            </td>
                            <td>
                                {{ $tkt['Ticket_date'] }}
                            </td>
                            <td>
                                {{ $tkt['Time'] }}
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ URL::to('/') }}/delete_ticket1/{{ $tkt['Ticket_id'] }}">
                                    <button id="action" class="delete"><i class="bi bi-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" style="text-align: center;">
                            <h3>Nothing found</h3>
                        </td>
                    </tr>
                @endif
            </table>


        </main>
    @endsection
</body>

</html>
