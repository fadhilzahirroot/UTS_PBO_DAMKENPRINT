@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('header')
    <a href="{{ route('karyawan.index') }}" class="back-link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        Kembali ke Daftar Karyawan
    </a>
    <div class="page-head">
        <h1 class="page-title">Tambah Karyawan</h1>
    </div>
@endsection

@section('content')
    <form action="{{ route('karyawan.store') }}" method="POST" class="card form-card">
        @csrf

        <div class="form-grid">
            <div class="field">
                <label for="kode">Kode Karyawan</label>
                <input type="text" id="kode" name="kode" class="input" value="{{ old('kode') }}"
                       placeholder="Contoh: KRY-001" autocomplete="off" required
                       @error('kode') aria-invalid="true" aria-describedby="kode-error" @enderror>
                @error('kode')
                    <p class="field-error" id="kode-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nama">Nama Karyawan</label>
                <input type="text" id="nama" name="nama" class="input" value="{{ old('nama') }}"
                       placeholder="Nama lengkap" required
                       @error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror>
                @error('nama')
                    <p class="field-error" id="nama-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="kategori">Kategori (Jabatan)</label>
                <input type="text" id="kategori" name="kategori" class="input" value="{{ old('kategori') }}"
                       placeholder="Contoh: Editor, Admin, Produksi"
                       @error('kategori') aria-invalid="true" aria-describedby="kategori-error" @enderror>
                @error('kategori')
                    <p class="field-error" id="kategori-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="input" value="{{ old('lokasi') }}"
                       placeholder="Contoh: Pusat"
                       @error('lokasi') aria-invalid="true" aria-describedby="lokasi-error" @enderror>
                @error('lokasi')
                    <p class="field-error" id="lokasi-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="jumlah">Gaji</label>
                <div class="input-group">
                    <span class="input-addon" aria-hidden="true">Rp</span>
                    <input type="text" id="jumlah" name="jumlah" class="input" value="{{ old('jumlah') }}"
                           inputmode="numeric" pattern="[0-9]*" placeholder="3500000"
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
                    <option value="Aktif" {{ old('kondisi', 'Aktif') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('kondisi') === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('kondisi')
                    <p class="field-error" id="kondisi-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Karyawan</button>
        </div>
    </form>
@endsection
