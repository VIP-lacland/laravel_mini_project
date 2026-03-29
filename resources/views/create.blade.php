<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg border-0">
                
                <!-- Header -->
                <div class="card-header bg-success text-white text-center">
                    <h4>
                        <i class="bi bi-person-plus-fill"></i> Thêm User
                    </h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="/users/store">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="username" class="form-control" placeholder="Nhập username">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Nhập password">
                            </div>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-save"></i> Lưu User
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>