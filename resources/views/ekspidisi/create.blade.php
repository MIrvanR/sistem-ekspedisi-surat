@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Ekspedisi Surat</h3>

    <form action="{{ route('ekspedisi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Surat</label>
            <select name="surat_id" class="form-control" required>
                <option value="">-- Pilih Surat --</option>
                @foreach($surats as $surat)
                    <option value="{{ $surat->id }}">
                        {{ $surat->nama_surat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Bagian Tujuan</label>
            <select name="bagian_id" class="form-control" required>
                <option value="">-- Pilih Bagian --</option>
                @foreach($bagians as $bagian)
                    <option value="{{ $bagian->id }}">
                        {{ $bagian->nama_bagian }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Kirim</label>
            <input type="date" name="tanggal_kirim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bukti Foto</label>
            <input type="file" name="bukti_foto" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection