<!-- resources/views/admin/categories/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - Photobooth App</title>
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
                <div class="py-4 px-6 flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Kelola Kategori</h1>
                    <a href="{{ route('admin.categories.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Tambah Kategori Baru
                    </a>
                </div>
            </header>

            <main class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Icon</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Frame</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-2xl">{{ $category->icon }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $category->frames->count() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada
                                        kategori yang ditambahkan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
