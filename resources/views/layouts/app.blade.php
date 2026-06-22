<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul dinamis -->
    <title>@yield('title') - TokoKita</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body class="bg-light">

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">TokoKita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tentang">Tentang</a>
                    </li>
                </ul>
                @auth
                    <form action="/logout" method="POST" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Hi,
                            {{ Auth::user()->name }}({{ Auth::user()->role }}) - Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Tempat Konten Utama Disisipkan -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center p-4 mt-5 text-muted border-top">
        &copy; {{ date('Y') }} TokoKita. Hak Cipta Dilindungi.
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN (Untuk Dropdown, Modal, dll) -->
    <script
        src="[https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js](https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js)">
    </script>
</body>

</html>
