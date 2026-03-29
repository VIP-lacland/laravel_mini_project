<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h2>Quản lý User</h2>

<a href="/users/create" class="btn btn-success mb-3">+ Thêm user</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="/users/edit/{{ $user->id }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<a href="/logout" class="btn btn-secondary">Đăng xuất</a>

</body>
</html>