<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            height: 100vh;
        } */
        .register-box {
            margin-top: 80px;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container register-box">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4">Đăng ký</h3>

                {{-- Hiện lỗi --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <div class="input-group">
                        <span class="input-group-text"> <i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control">
                     </div>
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary w-100">Đăng ký</button>
                    <div class="text-center mt-3"> <a href="/login">Đã có tài khoản? Đăng nhập</a> </div>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>