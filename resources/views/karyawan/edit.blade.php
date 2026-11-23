@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('header')
    <a href="{{ route('karyawan.index') }}" class="back-link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        Kembali ke Daftar Karyawan
    </a>
    <div class="page-head">
        <h1 class="page-title">Edit Karyawan</h1>
    </div>
@endsection

@section('content')
    <form action="{{ route('karyawan.update', $karyawan['kode']) }}" method="POST" class="card form-card">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label for="kode">Kode Karyawan</label>
                <input type="text" id="kode" class="input" value="{{ $karyawan['kode'] }}" disabled aria-describedby="kode-hint">
                <p class="field-hint" id="kode-hint">Kode tidak dapat diubah.</p>
            </div>

            <div class="field">
                <label for="nama">Nama Karyawan</label>
                <input type="text" id="nama" name="nama" class="input" value="{{ old('nama', $karyawan['nama']) }}" required
                       @error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror>
                @error('nama')
                    <p class="field-error" id="nama-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="kategori">Kategori (Jabatan)</label>
                <input type="text" id="kategori" name="kategori" class="input" value="{{ old('kategori', $karyawan['kategori']) }}"
                       @error('kategori') aria-invalid="true" aria-describedby="kategori-error" @enderror>
                @error('kategori')
                    <p class="field-error" id="kategori-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="input" value="{{ old('lokasi', $karyawan['lokasi']) }}"
                       @error('lokasi') aria-invalid="true" aria-describedby="lokasi-error" @enderror>
                @error('lokasi')
                    <p class="field-error" id="lokasi-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="jumlah">Gaji</label>
                <div class="input-group">
                    <span class="input-addon" aria-hidden="true">Rp</span>
                    <input type="text" id="jumlah" name="jumlah" class="input" value="{{ old('jumlah', $karyawan['jumlah']) }}"
                           inputmode="numeric" pattern="[0-9]*"
                           aria-describedby="jumlah-hint @error('jumlah') jumlah-error @enderror"
                           @error('jumlah') aria-invalid="true" @enderror>
                </div>
                <p class="field-hint" id="jumlah-hint">Isi angka saja, tanpa titik.</p>
                @error('jumlah')
                    <p class="field-error" id="jumlah-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="kondisi">Status</label>
                <select id="kondisi" name="kondisi" class="select"
                        @error('kondisi') aria-invalid="true" aria-describedby="kondisi-error" @enderror>
                    <option value="Aktif" {{ old('kondisi', $karyawan['kondisi']) === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('kondisi', $karyawan['kondisi']) === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('kondisi')
                    <p class="field-error" id="kondisi-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
@endsection
