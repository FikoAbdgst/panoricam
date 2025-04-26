<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Photobooth App</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Photobooth Admin</h2>
                <p class="text-sm text-gray-400 mt-1">Selamat datang, {{ session('admin_name') }}</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.frames.index') }}"
                    class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.frames.*') ? 'bg-gray-700 text-white' : '' }}">
                    <span>Kelola Frame</span>
                </a>
                <a href="{{ route('admin.logout') }}"
                    class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="py-4 px-6">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
            </header>

            <main class="p-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Selamat Datang di Dashboard Admin</h2>
                    <p>Gunakan sidebar untuk menavigasi ke berbagai bagian panel admin.</p>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h3 class="font-bold text-lg text-blue-800">Kelola Frame</h3>
                            <p class="text-blue-600">Tambah, edit, dan hapus frame untuk photobooth.</p>
                            <a href="{{ route('admin.frames.index') }}"
                                class="mt-2 inline-block text-blue-700 hover:text-blue-900">Kelola Sekarang →</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
