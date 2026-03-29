<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            height: 100vh;
        } */
        .login-box {
            margin-top: 80px;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container login-box">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4">Đăng nhập</h3>

                {{-- lỗi --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- success từ register --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-primary w-100">Đăng nhập</button>

                    <div class="text-center mt-3">
                        <a href="/register">Chưa có tài khoản? Đăng ký</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>