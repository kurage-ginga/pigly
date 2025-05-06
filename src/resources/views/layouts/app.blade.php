<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PiGLy')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- カスタムスタイル -->
    <style>
        body {
            background: linear-gradient(to bottom right, #fbc2eb, #a6c1ee);
            min-height: 100vh;
            font-family: 'Helvetica Neue', sans-serif;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #caa0e6;
            border-color: #caa0e6;
        }
        .btn-primary:hover {
            background-color: #b78dd3;
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="container py-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
