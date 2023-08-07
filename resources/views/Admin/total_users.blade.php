<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('master_view')
@section('content')
<main class="mt-5 pt-3">
<table>
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
                Gender
            </th>
            <th>
                Password
            </th>
            <th>
                Hobbies
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

        @foreach($users as $d)
        <tr>
            <td>
                {{$d['id']}}
            </td>
            <td>
                {{$d['fullname']}}
            </td>
            <td>
                {{$d['mobile']}}
            </td>
            <td>
                {{$d['email']}}
            </td>
            <td>
                {{$d['gender']}}
            </td>
            <td>
                {{$d['password']}}
            </td>
            <td>
                {{$d['hobbies']}}
            </td>
            <td>
                {{$d['role']}}
            </td>
            <td>
                {{$d['status']}}
            </td>
            <td>
                <img src="{{ URL::to('/') }}/Images/profile_pic/{{ $d['pic'] }}" alt="" height="80px" width="80px">
            </td>
            <td>
                <a href="{{ URL::to('/') }}/edit_registration/{{ $d['email'] }}"><input type="button" value="Edit"></a>
            </td>
            <td>
                <a href="{{ URL::to('/') }}/delete_registration/{{ $d['email'] }}"><input type="button" value="Delete"></a>
            </td>
            <td>
                @if ($d['status'] == 'Active')
                <a href="{{ URL::to('/') }}/deactivate_user/{{ $d['email'] }}"><input type="button" value="Deactivate"></a>
                @elseif($d['status'] == 'Inactive')
                <a href="{{ URL::to('/') }}/activate_user/{{ $d['email'] }}"><input type="button" value="Activate"></a>
                @else
                <a href="{{ URL::to('/') }}/reactivate_user/{{ $d['email'] }}"><input type="button" value="Reactivate"></a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</main>
@endsection
</body>
</html>