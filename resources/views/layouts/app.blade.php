<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary min-vh-100">
    <header class="bg-primary text-white py-4 mb-3 shadow-sm">
        <div class="container">
            <h1 class="h2 fw-bold mb-1">My Medicine Stock</h1>
            <h2 class="h6 fw-normal mb-0 opacity-75">Renan James Z. Miranda</h2>
        </div>
    </header>

    @include('partials._nav')

    <main class="container pb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
