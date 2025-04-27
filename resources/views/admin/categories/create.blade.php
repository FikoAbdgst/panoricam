<!-- resources/views/admin/categories/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Baru - Photobooth App</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Photobooth Admin</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700 text-white' : '' }}">
                    <span>Kelola Kategori</span>
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
                    <h1 class="text-2xl font-bold">Tambah Kategori Baru</h1>
                </div>
            </header>

            <main class="p-6">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow p-6">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama
                                Kategori</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="icon" class="block text-gray-700 text-sm font-bold mb-2">Icon
                                (Emoji)</label>
                            <input type="text" name="icon" id="icon"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ old('icon') }}" required placeholder="📷">
                            <p class="text-sm text-gray-500 mt-1">Masukkan emoji yang sesuai untuk kategori ini. Contoh:
                                📷, 🎉, 👑, dll.</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan Kategori
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
