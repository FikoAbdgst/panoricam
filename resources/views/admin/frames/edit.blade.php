@extends('layouts.app-admin')

@section('section')
    <div class="flex-1">
        <header class="bg-white shadow">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold">Edit Frame</h1>
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
                <form action="{{ route('admin.frames.update', $frame) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Frame</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('name', $frame->name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $frame->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Frame Saat Ini</label>
                        @if ($frame->image_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $frame->image_path) }}" alt="{{ $frame->name }}"
                                    class="h-32 w-auto object-contain">
                            </div>
                        @else
                            <p class="text-gray-500 italic mb-2">Tidak ada gambar</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar
                            Frame (Opsional)</label>
                        <input type="file" name="image" id="image"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Perbarui Frame
                        </button>
                        <a href="{{ route('admin.frames.index') }}" class="text-gray-600 hover:text-gray-800">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-semibold mb-3">Frame Images</h2>
                @if ($frame->frameImages->count() > 0)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Preview
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jumlah Frame
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($frame->frameImages as $frameImage)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $frameImage->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                @if ($frameImage->frame1)
                                                    <img src="{{ asset('storage/' . $frameImage->frame1) }}" alt="Frame 1"
                                                        class="h-16 w-auto object-contain">
                                                @endif
                                                @if ($frameImage->frame2)
                                                    <img src="{{ asset('storage/' . $frameImage->frame2) }}" alt="Frame 2"
                                                        class="h-16 w-auto object-contain">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @php
                                                $count = 0;
                                                if ($frameImage->frame1) {
                                                    $count++;
                                                }
                                                if ($frameImage->frame2) {
                                                    $count++;
                                                }
                                                if ($frameImage->frame3) {
                                                    $count++;
                                                }
                                                if ($frameImage->frame4) {
                                                    $count++;
                                                }
                                            @endphp
                                            {{ $count }} frame
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.frameimages.edit', $frameImage) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="{{ route('admin.frameimages.show', $frameImage) }}"
                                                class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                                            <form action="{{ route('admin.frameimages.destroy', $frameImage) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus frame image ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow p-6 text-center">
                        <p class="text-gray-500">Belum ada frame image yang ditambahkan</p>
                        <a href="{{ route('admin.frameimages.create') }}"
                            class="mt-3 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Tambah Frame Image
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
