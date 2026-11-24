<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Ambil semua data karyawan dari session
    public function index()
    {
        $karyawans = session('karyawans', []);
        return view('karyawan.index', compact('karyawans'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('karyawan.create');
    }

    // Simpan data baru ke session
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'     => ['required', 'string', 'alpha_dash:ascii', 'max:30'],
            'nama'     => ['required', 'string', 'max:120'],
            'kategori' => ['required', 'string', 'max:80'],
            'lokasi'   => ['required', 'string', 'max:120'],
            'jumlah'   => ['required', 'integer', 'min:0'],
            'kondisi'  => ['required', 'string', 'max:80'],
        ]);

        $karyawans = session('karyawans', []);

        if (isset($karyawans[$data['kode']])) {
            return back()
                ->withInput()
                ->withErrors(['kode' => 'Kode karyawan sudah digunakan.']);
        }

        $karyawans[$data['kode']] = [
            'kode'     => $data['kode'],
            'nama'     => $data['nama'],
            'kategori' => $data['kategori'],
            'lokasi'   => $data['lokasi'],
            'jumlah'   => (int) $data['jumlah'],
            'kondisi'  => $data['kondisi'],
        ];

        session(['karyawans' => $karyawans]);

        return redirect()->route('karyawan.index')
                         ->with('status', 'Data karyawan berhasil ditambahkan.');
    }

    // Tampilkan detail satu karyawan
    public function show($kode)
    {
        $karyawans = session('karyawans', []);

        if (!isset($karyawans[$kode])) {
            return redirect()->route('karyawan.index')
                             ->with('status', 'Data karyawan tidak ditemukan.');
        }

        $karyawan = $karyawans[$kode];
        return view('karyawan.show', compact('karyawan'));
    }

    // Tampilkan form edit dengan data lama
    public function edit($kode)
    {
        $karyawans = session('karyawans', []);

        if (!isset($karyawans[$kode])) {
            return redirect()->route('karyawan.index')
                             ->with('status', 'Data karyawan tidak ditemukan.');
        }

        $karyawan = $karyawans[$kode];
        return view('karyawan.edit', compact('karyawan'));
    }

    // Simpan perubahan data ke session
    public function update(Request $request, $kode)
    {
        $karyawans = session('karyawans', []);

        if (!isset($karyawans[$kode])) {
            return redirect()->route('karyawan.index')
                             ->with('status', 'Data karyawan tidak ditemukan.');
        }

        $data = $request->validate([
            'nama'     => ['required', 'string', 'max:120'],
            'kategori' => ['required', 'string', 'max:80'],
            'lokasi'   => ['required', 'string', 'max:120'],
            'jumlah'   => ['required', 'integer', 'min:0'],
            'kondisi'  => ['required', 'string', 'max:80'],
        ]);

        $karyawans[$kode] = [
            'kode'     => $kode,
            'nama'     => $data['nama'],
            'kategori' => $data['kategori'],
            'lokasi'   => $data['lokasi'],
            'jumlah'   => (int) $data['jumlah'],
            'kondisi'  => $data['kondisi'],
        ];

        session(['karyawans' => $karyawans]);

        return redirect()->route('karyawan.index')
                         ->with('status', 'Data karyawan berhasil diperbarui.');
    }

    // Hapus data dari session
    public function destroy($kode)
    {
        $karyawans = session('karyawans', []);

        if (!isset($karyawans[$kode])) {
            return redirect()->route('karyawan.index')
                             ->with('status', 'Data karyawan tidak ditemukan.');
        }

        unset($karyawans[$kode]);
        session(['karyawans' => $karyawans]);

        return redirect()->route('karyawan.index')
                         ->with('status', 'Data karyawan berhasil dihapus.');
    }
}