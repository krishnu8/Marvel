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

            {{-- @if (session('reg'))
            <script>
                swal({
                    title: "Sorry!",
                    text: "{{ session('error') }}",
                    icon: "warning",
                    button: "OK",
                });

                setTimeout(function() {
                    $('.alert').alert('close');
                }, 3000);
            </script>

            <script>
                // Automatically close the alert after 5 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 3000);
            </script>
        @endif --}}
            @if (session('error'))
                <script>
                    swal({
                        title: "Sorry!",
                        text: "{{ session('error') }}",
                        icon: "warning",
                        button: "OK",
                    });
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 3000);
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
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 3000);
                </script>
            @endif
            <div class="container-fluid bg-light">
                <div class="row">
                    <div class="col headers">
                        <h1>Total Users</h1>
                    </div>
                </div>
                <div class="row bg-info">
                    <div class="col header-btn">
                        <a href="user_add">
                            <button class="button-70" role="button">Add User</button>
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
                            @php
                                $imgname = $data['Profile_Pic'];
                            @endphp
                            @if ($imgname == "Default.png")
                                <img src="{{ URL::to('/') }}/pictures/default/Deafult.png">
                                {{-- <p>{{ $imgname }}</p> --}}
                            @else
                            <img src="{{ URL::to('/') }}/pictures/{{ $data['Profile_Pic'] }}">
                            @endif
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
                                        class="activate">Activate</button></a>
                            @endif

                            @if ($data['Status'] == 'Deleted')
                                <a href="{{ URL::to('/') }}/reactivate_user/{{ $data['Email'] }}"><button id="action"
                                        class="reactivate">Reactivate</button></a>
                            @endif



                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    @endsection
</body>

</html>
