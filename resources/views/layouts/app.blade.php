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
        @yield('hero section')
        @yield('content section')
    </main>

    <!-- Scripts -->
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            const originalClasses = navbar.className;

            window.addEventListener('scroll', function() {
                if (window.scrollY > 10) {
                    // Ketika di-scroll, tambahkan class fixed dan shadow
                    navbar.className =
                        'fixed top-0 left-0 right-0 bg-white shadow-md w-full h-20 z-50 transition-all duration-300';
                } else {
                    // Kembalikan ke class original ketika di atas
                    navbar.className = originalClasses;
                }
            });
        });
    </script>
</body>

</html>
