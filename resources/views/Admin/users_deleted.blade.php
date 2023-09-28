<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Users</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col headers">
                    <h1>Deleted Users</h1>
                </div>
            </div>
        </div>
        <table>
            <tr style="height: 50px">
                <th>
                    Id
                </th>
                <th>
                    Pic
                </th>
                <th>
                    Fullname
                </th>
                <th>
                    Mobile
                </th>
                <th>
                    Email
                </th>
                <th>
                    Gender
                </th>
                <th>
                    Password
                </th>
                <th>
                    Role
                </th>
                <th>
                    Status
                </th>
                <th>
                    Status
                </th>
            </tr>

            @foreach ( $del_user as $user)

            <tr>
                <td>
                    {{ $user['id'] }}
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/{{ $user['Profile_Pic'] }}">
                </td>
                <td>
                    {{ $user['Username'] }}
                </td>
                <td>
                    {{ $user['Mobile_No'] }}
                </td>
                <td>
                    {{ $user['Email'] }}
                </td>
                <td>
                    {{ $user['Gender'] }}
                </td>
                <td>
                    {{ $user['Password'] }}
                </td>
                <td>
                    {{ $user['Role'] }}
                </td>
                <td>
                    {{ $user['Status'] }}
                </td>
                <td style="text-align: center;">
                    <a href="{{ URL::to('/') }}/reactivate_user/{{ $user['Email'] }}""><button id="action" class="activate">Reactivate</button></a>

                    <!-- <a href="{{ URL::to('/') }}/activate_user/"><input type="button" value="Activate"></a>

                <a href="{{ URL::to('/') }}/reactivate_user/"><input type="button" value="Reactivate"></a> -->

                </td>
            </tr>
            @endforeach
        </table>

    </main>
    @endsection
</body>

</html>
