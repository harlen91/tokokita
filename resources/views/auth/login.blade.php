<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login - Modern UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background: #4e73df;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #2e59d9;
            transform: translateY(-1px);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
            border-color: #4e73df;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <div class="card login-card p-4 bg-white">
                    <div class="card-body">

                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-dark m-0">Selamat Datang</h3>
                            <p class="text-muted small">Silakan masuk ke akun Anda</p>
                        </div>

                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-secondary small fw-semibold">Alamat
                                    Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i
                                            class="bi bi-envelope text-muted"></i></span>
                                    <input type="email" class="form-control bg-light border-start-0" id="email"
                                        placeholder="nama@email.com" name="email">
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label text-secondary small fw-semibold m-0">Kata
                                        Sandi</label>
                                    <a href="#" class="text-decoration-none small" style="color: #4e73df;">Lupa
                                        Sandi?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i
                                            class="bi bi-lock text-muted"></i></span>
                                    <input type="password" class="form-control bg-light border-start-0" name="password"
                                        placeholder="••••••••" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label text-secondary small" border id="rememberMe"
                                    for="rememberMe">Ingat saya di perangkat ini</label>
                            </div>

                            <button type="submit"
                                class="btn btn-primary btn-login w-100 text-white mb-3">Masuk</button>

                        </form>

                        <div class="text-center">
                            <p class="text-muted small m-0">Belum punya akun? <a href="#"
                                    class="text-decoration-none fw-semibold" style="color: #4e73df;">Daftar Sekarang</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
