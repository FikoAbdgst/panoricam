@extends('layouts.app-admin')

@section('section')
    <div class="flex-1">
        <header class="bg-white shadow">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold">Tambah Frame Image Baru</h1>
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
                <form action="{{ route('admin.frameimages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="id_frame" class="block text-gray-700 text-sm font-bold mb-2">Frame</label>
                        <select name="id_frame" id="id_frame"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">-- Pilih Frame --</option>
                            @foreach ($frames as $frame)
                                <option value="{{ $frame->id }}" {{ old('id_frame') == $frame->id ? 'selected' : '' }}>
                                    {{ $frame->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="frame1" class="block text-gray-700 text-sm font-bold mb-2">Gambar Frame 1</label>
                        <input type="file" name="frame1" id="frame1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
                    </div>

                    <div class="mb-4">
                        <label for="frame2" class="block text-gray-700 text-sm font-bold mb-2">Gambar Frame 2
                            (Opsional)</label>
                        <input type="file" name="frame2" id="frame2"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
                    </div>

                    <div class="mb-4">
                        <label for="frame3" class="block text-gray-700 text-sm font-bold mb-2">Gambar Frame 3
                            (Opsional)</label>
                        <input type="file" name="frame3" id="frame3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
                    </div>

                    <div class="mb-4">
                        <label for="frame4" class="block text-gray-700 text-sm font-bold mb-2">Gambar Frame 4
                            (Opsional)</label>
                        <input type="file" name="frame4" id="frame4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Simpan Frame Image
                        </button>
                        <a href="{{ route('admin.frameimages.index') }}" class="text-gray-600 hover:text-gray-800">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
