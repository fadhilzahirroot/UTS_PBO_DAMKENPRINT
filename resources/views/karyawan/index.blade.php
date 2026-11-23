@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('header')
    <div class="page-head">
        <div>
            <h1 class="page-title">Daftar Karyawan</h1>
            <p class="page-meta">{{ count($karyawans) }} karyawan</p>
        </div>

        @if(count($karyawans) > 0)
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">+ Tambah Karyawan</a>
        @endif
    </div>
@endsection

@section('content')
    @if(count($karyawans) === 0)
        <div class="card empty-state">
            <svg width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="6" width="18" height="13" rx="2"/><path d="M10.5 6V4.5h3V6"/><circle cx="9" cy="11.5" r="2"/><path d="M5.8 16.6c.7-1.3 1.8-1.9 3.2-1.9s2.5.6 3.2 1.9"/><path d="M14.5 10.5h4M14.5 13.5h4"/></svg>
            <h2>Belum ada data karyawan</h2>
            <p>Tambahkan karyawan untuk mulai mengisi daftar.</p>
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">+ Tambah Karyawan</a>
        </div>
    @else
        <div class="card table-wrap">
            <table class="data-table">
                <caption class="sr-only">Daftar karyawan</caption>
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col" class="num">Gaji</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="col-aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $karyawan)
                        @php
                            $gaji = is_numeric($karyawan['jumlah'])
                                ? 'Rp' . number_format((float) $karyawan['jumlah'], 0, ',', '.')
                                : '-';
                        @endphp
                        <tr>
                            <td class="cell-kode">{{ $karyawan['kode'] }}</td>
                            <td class="cell-nama">
                                <span class="nama">{{ $karyawan['nama'] }}</span>
                                {{-- Baris ringkas khusus tampilan HP --}}
                                <span class="m-meta">{{ $karyawan['kode'] }} · {{ $karyawan['kategori'] }} · {{ $karyawan['lokasi'] }}</span>
                                <span class="m-gaji">{{ $gaji }}</span>
                            </td>
                            <td class="cell-kategori">{{ $karyawan['kategori'] }}</td>
                            <td class="cell-lokasi">{{ $karyawan['lokasi'] }}</td>
                            <td class="cell-gaji num">{{ $gaji }}</td>
                            <td class="cell-status">
                                <span class="status {{ $karyawan['kondisi'] === 'Aktif' ? 'is-active' : 'is-inactive' }}">{{ $karyawan['kondisi'] }}</span>
                            </td>
                            <td class="cell-aksi col-aksi">
                                <details class="row-menu">
                                    <summary class="icon-btn" aria-label="Aksi untuk {{ $karyawan['nama'] }}">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="5" cy="12" r="1.8"/><circle cx="12" cy="12" r="1.8"/><circle cx="19" cy="12" r="1.8"/></svg>
                                    </summary>
                                    <div class="menu-panel">
                                        <a href="{{ route('karyawan.show', $karyawan['kode']) }}" class="menu-item">Detail</a>
                                        <a href="{{ route('karyawan.edit', $karyawan['kode']) }}" class="menu-item">Edit</a>
                                        <div class="menu-divider"></div>
                                        <form action="{{ route('karyawan.destroy', $karyawan['kode']) }}" method="POST"
                                              data-confirm="Hapus data {{ $karyawan['nama'] }} ({{ $karyawan['kode'] }})? Data yang dihapus tidak bisa dikembalikan."
                                              onsubmit="return confirm(this.dataset.confirm)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="menu-item menu-item--danger">Hapus</button>
                                        </form>
                                    </div>
                                </details>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
