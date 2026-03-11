<div>
    <video id="video" autoplay style="width:100%; border-radius:8px; border:1px solid #ccc;"></video>

    <button type="button" onclick="takePhoto()"
        style="margin-top:10px; padding:8px 12px; background:#2563eb; color:white; border:none; border-radius:6px;">
        Ambil Foto
    </button>

    <canvas id="canvas" style="display:none;"></canvas>

    <img id="preview" style="margin-top:10px; width:100%; border-radius:8px;" />
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');

    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function () {
                alert("Kamera tidak bisa diakses");
            });

    }

    window.takePhoto = function () {

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const context = canvas.getContext('2d');

        context.drawImage(video, 0, 0);

        const dataUrl = canvas.toDataURL('image/png');

        preview.src = dataUrl;

        const hiddenInput = document.querySelector('[name="bukti_foto"]');

        if (hiddenInput) {
            hiddenInput.value = dataUrl;
        }

    }

});

</script>