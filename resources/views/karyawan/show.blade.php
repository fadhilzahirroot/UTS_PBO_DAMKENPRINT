@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('header')
    <a href="{{ route('karyawan.index') }}" class="back-link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        Kembali ke Daftar Karyawan
    </a>
    <div class="page-head">
        <h1 class="page-title">Detail Karyawan</h1>
        <a href="{{ route('karyawan.edit', $karyawan['kode']) }}" class="btn btn-primary">Edit Karyawan</a>
    </div>
@endsection

@section('content')
    <div class="card">
        <dl class="detail-list">
            <div class="detail-row">
                <dt>Kode Karyawan</dt>
                <dd>{{ $karyawan['kode'] }}</dd>
            </div>
            <div class="detail-row">
                <dt>Nama Karyawan</dt>
                <dd>{{ $karyawan['nama'] }}</dd>
            </div>
            <div class="detail-row">
                <dt>Kategori (Jabatan)</dt>
                <dd>{{ $karyawan['kategori'] ?: '-' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Lokasi</dt>
                <dd>{{ $karyawan['lokasi'] ?: '-' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Gaji</dt>
                <dd>{{ is_numeric($karyawan['jumlah']) ? 'Rp' . number_format((float) $karyawan['jumlah'], 0, ',', '.') : '-' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Status</dt>
                <dd>
                    <span class="status {{ $karyawan['kondisi'] === 'Aktif' ? 'is-active' : 'is-inactive' }}">{{ $karyawan['kondisi'] }}</span>
                </dd>
            </div>
        </dl>
    </div>
@endsection
