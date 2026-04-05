<div x-data="{
        // Ini adalah kunci utamanya: menghubungkan variabel 'state' dengan field 'bukti_foto' di Livewire
        state: $wire.$entangle('{{ $getStatePath() }}'),
        stream: null,
        
        initCamera() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then((mediaStream) => {
                        this.stream = mediaStream;
                        $refs.video.srcObject = mediaStream;
                    })
                    .catch((error) => {
                        console.error('Kamera gagal diakses:', error);
                        alert('Kamera tidak bisa diakses. Pastikan izin kamera diberikan.');
                    });
            }
        },
        
        takePhoto() {
            let video = $refs.video;
            let canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            let context = canvas.getContext('2d');
            
            // Gambar frame video ke dalam canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Ambil data base64
            let dataUrl = canvas.toDataURL('image/png');
            
            // Tampilkan di layar (preview)
            this.state = dataUrl;
            
            // BARIS PENTING: Paksa Livewire untuk mencatat data foto ini
            $wire.set('{{ $getStatePath() }}', dataUrl);
        }
    }"
    x-init="initCamera()"
    class="space-y-4"
>

    <div x-show="!state" class="flex flex-col items-center">
        <video x-ref="video" autoplay class="w-full max-w-md rounded-lg border border-gray-300 shadow-sm"></video>
        
        <button type="button" x-on:click="takePhoto()"
            class="mt-3 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
            Ambil Foto
        </button>
    </div>

    <div x-show="state" class="flex flex-col items-center" style="display: none;">
        <img x-bind:src="state" class="w-full max-w-md rounded-lg border border-gray-300 shadow-sm" />
        
        <button type="button" x-on:click="state = null"
            class="mt-3 px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition">
            Ulangi Foto
        </button>
    </div>

</div>