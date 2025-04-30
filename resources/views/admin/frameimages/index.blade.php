@extends('layouts.app-admin')

@section('section')
    <div class="w-full">
        <header class="bg-white shadow">
            <div class="py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Kelola Frame Image</h1>
                <a href="{{ route('admin.frameimages.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Tambah Frame Image Baru
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
                                Nama Frame</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar 1</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar 2</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar 3</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar 4</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($frameImages as $frameImage)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $frameImage->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $frameImage->frame->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($frameImage->frame1)
                                        <img src="{{ asset('storage/' . $frameImage->frame1) }}" alt="Frame 1"
                                            class="h-16 w-auto object-contain">
                                    @else
                                        <span class="text-gray-400">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($frameImage->frame2)
                                        <img src="{{ asset('storage/' . $frameImage->frame2) }}" alt="Frame 2"
                                            class="h-16 w-auto object-contain">
                                    @else
                                        <span class="text-gray-400">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($frameImage->frame3)
                                        <img src="{{ asset('storage/' . $frameImage->frame3) }}" alt="Frame 3"
                                            class="h-16 w-auto object-contain">
                                    @else
                                        <span class="text-gray-400">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($frameImage->frame4)
                                        <img src="{{ asset('storage/' . $frameImage->frame4) }}" alt="Frame 4"
                                            class="h-16 w-auto object-contain">
                                    @else
                                        <span class="text-gray-400">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.frameimages.edit', $frameImage) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form action="{{ route('admin.frameimages.destroy', $frameImage) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus frame image ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada
                                    frame image yang ditambahkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
