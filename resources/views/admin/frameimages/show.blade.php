@extends('layouts.app-admin')

@section('section')
    <div class="flex-1">
        <header class="bg-white shadow">
            <div class="py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Detail Frame Image</h1>
                <div>
                    <a href="{{ route('admin.frameimages.edit', $frameimage) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                    <a href="{{ route('admin.frameimages.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>
            </div>
        </header>

        <main class="p-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-6 pb-6 border-b">
                    <h2 class="text-xl font-semibold mb-2">Informasi Frame</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">ID:</p>
                            <p class="font-medium">{{ $frameimage->id }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Nama Frame:</p>
                            <p class="font-medium">{{ $frameimage->frame->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Kategori Frame:</p>
                            <p class="font-medium">
                                {{ $frameimage->frame->category ? $frameimage->frame->category->name : 'Tidak Ada Kategori' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Dibuat Pada:</p>
                            <p class="font-medium">{{ $frameimage->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Diperbarui Pada:</p>
                            <p class="font-medium">{{ $frameimage->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Gambar Frame</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="font-medium text-lg mb-2">Frame 1</h3>
                            @if ($frameimage->frame1)
                                <img src="{{ asset('storage/' . $frameimage->frame1) }}" alt="Frame 1"
                                    class="w-full h-auto object-contain rounded-md">
                            @else
                                <div class="h-40 flex items-center justify-center bg-gray-100 rounded-md">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="font-medium text-lg mb-2">Frame 2</h3>
                            @if ($frameimage->frame2)
                                <img src="{{ asset('storage/' . $frameimage->frame2) }}" alt="Frame 2"
                                    class="w-full h-auto object-contain rounded-md">
                            @else
                                <div class="h-40 flex items-center justify-center bg-gray-100 rounded-md">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="font-medium text-lg mb-2">Frame 3</h3>
                            @if ($frameimage->frame3)
                                <img src="{{ asset('storage/' . $frameimage->frame3) }}" alt="Frame 3"
                                    class="w-full h-auto object-contain rounded-md">
                            @else
                                <div class="h-40 flex items-center justify-center bg-gray-100 rounded-md">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="font-medium text-lg mb-2">Frame 4</h3>
                            @if ($frameimage->frame4)
                                <img src="{{ asset('storage/' . $frameimage->frame4) }}" alt="Frame 4"
                                    class="w-full h-auto object-contain rounded-md">
                            @else
                                <div class="h-40 flex items-center justify-center bg-gray-100 rounded-md">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
