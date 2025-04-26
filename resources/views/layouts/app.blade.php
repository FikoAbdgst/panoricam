<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Photobooth App' }}</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="bg-gray-100">
    <!-- Include the navbar component -->
    @include('components.navbar')

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
