<!-- resources/views/booth.blade.php -->
@extends('layouts.app')

@push('styles')
    <style>
        .hidden {
            display: none;
        }

        #video-container {
            position: relative;
            width: 640px;
            height: 480px;
            margin: 0 auto;
        }

        #video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #frame-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
        }
    </style>
@endpush

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Photobooth</h1>
                <p class="mt-2 text-gray-600">Ambil foto dan pilih frame favorit Anda!</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Photobooth Container -->
                <div id="booth-container" class="flex flex-col items-center">
                    <!-- Camera view -->
                    <div id="video-container" class="mb-4">
                        <video id="video" autoplay playsinline class="rounded-lg"></video>
                        <canvas id="canvas" class="hidden"></canvas>
                        <img id="photo" class="hidden rounded-lg">
                        <img id="frame-overlay" src="" class="hidden">
                    </div>

                    <!-- Controls -->
                    <div class="flex space-x-4 mb-6">
                        <button id="btn-capture"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ambil Foto
                        </button>
                        <button id="btn-retake"
                            class="hidden bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Ambil Ulang
                        </button>
                        <button id="btn-download"
                            class="hidden bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Foto
                        </button>
                    </div>

                    <!-- Frame selection -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold mb-2">Pilih Frame</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($frames as $frame)
                                <div class="frame-option cursor-pointer p-2 border-2 border-transparent hover:border-blue-500 rounded-lg transition-all"
                                    data-frame="{{ asset('storage/' . $frame->image_path) }}">
                                    <img src="{{ asset('storage/' . $frame->image_path) }}" alt="{{ $frame->name }}"
                                        class="w-full h-32 object-contain">
                                    <p class="text-center mt-1">{{ $frame->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Variabel untuk elemen DOM
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const frameOverlay = document.getElementById('frame-overlay');
        const captureButton = document.getElementById('btn-capture');
        const retakeButton = document.getElementById('btn-retake');
        const downloadButton = document.getElementById('btn-download');
        const frameOptions = document.querySelectorAll('.frame-option');

        // Variabel untuk menyimpan stream kamera
        let stream = null;

        // Fungsi untuk memulai kamera
        async function startCamera() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        width: {
                            ideal: 640
                        },
                        height: {
                            ideal: 480
                        }
                    },
                    audio: false
                });
                video.srcObject = stream;
            } catch (err) {
                console.error("Error accessing camera: ", err);
                alert("Tidak dapat mengakses kamera. Pastikan Anda memberikan izin.");
            }
        }

        // Fungsi untuk mengambil foto
        function capturePhoto() {
            const context = canvas.getContext('2d');

            // Set ukuran canvas sama dengan video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // Gambar frame video ke canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Konversi canvas ke URL data dan tampilkan di img
            photo.src = canvas.toDataURL('image/png');

            // Tampilkan foto dan frame overlay
            video.classList.add('hidden');
            photo.classList.remove('hidden');

            // Tampilkan frame jika sudah dipilih
            if (frameOverlay.src) {
                frameOverlay.classList.remove('hidden');
            }

            // Ganti tombol
            captureButton.classList.add('hidden');
            retakeButton.classList.remove('hidden');
            downloadButton.classList.remove('hidden');

            // Hentikan stream kamera
            stopCamera();
        }

        // Fungsi untuk mengambil ulang foto
        function retakePhoto() {
            // Sembunyikan foto dan frame overlay
            photo.classList.add('hidden');
            frameOverlay.classList.add('hidden');
            video.classList.remove('hidden');

            // Ganti tombol
            captureButton.classList.remove('hidden');
            retakeButton.classList.add('hidden');
            downloadButton.classList.add('hidden');

            // Mulai kamera kembali
            startCamera();
        }

        // Fungsi untuk menghentikan kamera
        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => {
                    track.stop();
                });
            }
        }

        // Fungsi untuk mengunduh foto
        function downloadPhoto() {
            // Buat canvas baru untuk menggabungkan foto dan frame
            const finalCanvas = document.createElement('canvas');
            const context = finalCanvas.getContext('2d');

            finalCanvas.width = photo.naturalWidth;
            finalCanvas.height = photo.naturalHeight;

            // Gambar foto ke canvas
            context.drawImage(photo, 0, 0);

            // Jika ada frame yang dipilih, gambar juga framenya
            if (frameOverlay.src && !frameOverlay.classList.contains('hidden')) {
                context.drawImage(frameOverlay, 0, 0, finalCanvas.width, finalCanvas.height);
            }

            // Buat link untuk download
            const link = document.createElement('a');
            link.download = 'photobooth-' + new Date().getTime() + '.png';
            link.href = finalCanvas.toDataURL('image/png');
            link.click();
        }

        // Event listener untuk tombol
        captureButton.addEventListener('click', capturePhoto);
        retakeButton.addEventListener('click', retakePhoto);
        downloadButton.addEventListener('click', downloadPhoto);

        // Event listener untuk opsi frame
        frameOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Hapus seleksi dari frame sebelumnya
                frameOptions.forEach(opt => opt.classList.remove('border-blue-500'));

                // Tambahkan seleksi ke frame yang dipilih
                this.classList.add('border-blue-500');

                // Set frame overlay
                frameOverlay.src = this.dataset.frame;

                // Tampilkan frame overlay jika foto sudah diambil
                if (!photo.classList.contains('hidden')) {
                    frameOverlay.classList.remove('hidden');
                }
            });
        });

        // Mulai kamera saat halaman dimuat
        window.addEventListener('load', startCamera);

        // Hentikan kamera saat meninggalkan halaman
        window.addEventListener('beforeunload', stopCamera);
    </script>
@endpush
