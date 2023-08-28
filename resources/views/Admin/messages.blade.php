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
                <th colspan="7">Messages</th>
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
                    Message
                </th>
                <th>
                    Delete
                </th>
            </tr>


            <tr>
                <td>
                </td>
                <td style="text-align: center;">
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