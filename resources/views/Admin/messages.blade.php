<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">

        <table>
            <thead>
                <th colspan="6">Messages</th>
                </tr>
            </thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Number
                </th>
                <th>
                    Deleted
                </th>
                <th>
                    Delete
                </th>
            </tr>

            @foreach ($msgs as $msg)
            <tr>
                <td>
                    {{ $msg['id'] }}
                </td>
                <td style="text-align: center;">
                    {{ $msg['Name'] }}
                </td>
                <td>
                    {{ $msg['Email'] }}
                </td>
                <td>
                    {{ $msg['Message'] }}
                </td>
                <td>
                    {{ $msg['deleted'] }}
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/delete_msg1/{{$msg['id']}}">
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
<script>
    swal({
        title: "Hello",
        text: "You clicked the button!",
        icon: "success",
        button: "OK",
    });
    setTimeout("", 5000);
</script>