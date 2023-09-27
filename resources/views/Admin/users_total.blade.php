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

            @if (session('error'))
                <script>
                    swal({
                        title: "Sorry!",
                        text: "{{ session('error') }}",
                        icon: "warning",
                        button: "OK",
                    });
                </script>
            @endif
            @if (session('succ'))
                <script>
                    swal({
                        title: "Congratulations!",
                        text: "{{ session('succ') }}",
                        icon: "success",
                        button: "OK",
                    });
                </script>
            @endif
            <table>
                <thead>
                    <tr>
                        <th colspan="2">
                            <a href="user_add">
                                <button class="button-70" role="button">Add User</button>
                            </a>
                        </th>
                        <th colspan="13">Total Users</th>
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
                        Gender
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
                            {{ $data['id'] }}
                        </td>
                        <td>
                            {{ $data['Username'] }}
                        </td>
                        <td>
                            {{ $data['Mobile_No'] }}
                        </td>
                        <td>
                            {{ $data['Email'] }}
                        </td>
                        <td>
                            {{ $data['Password'] }}
                        </td>
                        <td>
                            {{ $data['Gender'] }}
                        </td>
                        <td>
                            {{ $data['Role'] }}
                        </td>
                        <td>
                            {{ $data['Status'] }}
                        </td>
                        <td style="text-align: center;">
                            <img src="{{ URL::to('/') }}/pictures/{{ $data['Profile_Pic'] }}">
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/update_account1/{{ $data['Email'] }}"><button id="action"
                                    class="edit"><i class="bi bi-pencil-square"></i></button></a>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ URL::to('/') }}/delete_account/{{ $data['Email'] }}"><button id="action"
                                    class="delete"><i class="bi bi-trash"></i></button></a>
                        </td>
                        <td style="text-align: center;">

                            @if ($data['Status'] == 'Active')
                                <a href="{{ URL::to('/') }}/deactivate_user/{{ $data['Email'] }}"><button id="action"
                                        class="deactivate">Deactivate</button></a>
                            @endif

                            @if ($data['Status'] == 'Inactive')
                                <a href="{{ URL::to('/') }}/activate_user/{{ $data['Email'] }}"><button id="action"
                                        class="deactivate">Activate</button></a>
                            @endif

                            @if ($data['Status'] == 'Deleted')
                                <a href="{{ URL::to('/') }}/reactivate_user/{{ $data['Email'] }}"><button id="action"
                                        class="deactivate">Reactivate</button></a>
                            @endif



                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    @endsection
</body>

</html>
