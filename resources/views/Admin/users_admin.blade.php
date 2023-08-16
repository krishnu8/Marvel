<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>

</head>

<body>
    @extends('Admin/master_view')
    @section('content')
    <main class="mt-5 pt-3">
        <table>
            <thead>
                <tr>
                    <th colspan="12">Admin Users</th>
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

            @foreach ($admin_data as $ad_data)
            <tr>
                <td>
                    {{$ad_data['id']}}
                </td>
                <td>
                    {{$ad_data['Full_Name']}}
                </td>
                <td>
                    {{$ad_data['Mobile_No']}}
                </td>
                <td>
                    {{$ad_data['Email']}}
                </td>
                <td>
                    {{$ad_data['Password']}}
                </td>
                <td>
                    {{$ad_data['User_Type']}}
                </td>
                <td>
                    {{$ad_data['Status']}}
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