@php
    $fotoPath = $getState();
    $fotoUrl = $fotoPath ? asset('storage/' . ltrim($fotoPath, '/')) : null;
@endphp

<div class="space-y-4">
    @if ($fotoUrl)
        <div class="flex justify-center">
            <img src="{{ $fotoUrl }}" alt="Bukti Foto" class="w-full max-w-3xl rounded-xl border border-gray-200 shadow-sm" />
        </div>
    @else
        <div class="rounded-xl border border-dashed border-gray-300 bg-gray-50 p-6 text-center text-sm text-gray-500">
            Foto tidak tersedia.
        </div>
    @endif
</div>
