<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">

                <!-- Header -->
                <div class="card-header bg-success text-white text-center">
                    <h4><i class="bi bi-pencil-square"></i> Thông tin User</h4>
                </div>

                <div class="card-body">
                <form action="/users/update/{{ $user->id }}" method="POST">
                    @csrf

                    <!-- ID (readonly) -->
                    <div class="mb-3 d-flex align-items-center">
                        <span class="badge bg-success me-2">ID</span>
                        <input type="text" class="form-control" value="{{ $user->id }}" readonly>
                    </div>

                    <!-- Username -->
                    <div class="mb-3 d-flex align-items-center">
                        <span class="input-group-text bg-success text-white me-2">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    </div>

                    <!-- Email -->
                    <div class="mb-3 d-flex align-items-center">
                        <span class="input-group-text bg-success text-white me-2">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>

                    <!-- Password -->
                    <div class="mb-3 d-flex align-items-center">
                        <span class="input-group-text bg-success text-white me-2">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Nhập password mới nếu muốn">
                    </div>

                    <!-- Nút cập nhật -->
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-save"></i> Cập nhật
                    </button>
                </form>
                                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>