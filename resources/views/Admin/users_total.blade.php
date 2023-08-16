<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Users</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <table>
            <thead>
                <tr>
                    <th colspan="2">
                        <a href="user_add">
                            Add User
                        </a>
                    </th>
                    <th colspan="12">Total Users</th>
                </tr>
            </thead>
            <tr>
                <th>
                    Id
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
                    Password
                </th>
                <th>
                    Role
                </th>
                <th>
                    Status
                </th>
                <th>
                    Pic
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

            @foreach ($total_user_data as $data)
            <tr>
                <td>
                    {{$data['id']}}
                </td>
                <td>
                    {{$data['Full_Name']}}
                </td>
                <td>
                    {{$data['Mobile_No']}}
                </td>
                <td>
                    {{$data['Email']}}
                </td>
                <td>
                    {{$data['Password']}}
                </td>
                <td>
                    {{$data['User_Type']}}
                </td>
                <td>
                    {{$data['Status']}}
                </td>
                <td style="text-align: center;">
                    <img src="{{ URL::to('/') }}/pictures/wall.jpg" alt="" height="80px" width="80px" style="border-radius: 50%;">
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
            @endforeach
        </table>
    </main>
    @endsection
</body>

</html>