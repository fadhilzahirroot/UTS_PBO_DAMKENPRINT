<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // property = satu sumber data, dipakai semua method. private = tak boleh disentuh dari luar (encapsulation)
    private $daftarUndangan = [
        ['id' => 1, 'nama' => 'Undangan Pernikahan Floral', 'jenis' => 'pernikahan', 'harga' => 3500],
        ['id' => 2, 'nama' => 'Undangan Pernikahan Elegan', 'jenis' => 'pernikahan', 'harga' => 4000],
        ['id' => 3, 'nama' => 'Undangan Khitanan Ceria',    'jenis' => 'khitanan',   'harga' => 2500],
        ['id' => 4, 'nama' => 'Undangan Aqiqah Simpel',     'jenis' => 'aqiqah',     'harga' => 2000],
    ];

    public function byKategori(string $jenis)
    {
        // array_filter: saring array, simpan yang kondisinya true
        $hasil = array_filter($this->daftarUndangan, function ($undangan) use ($jenis) {
            return $undangan['jenis'] === $jenis;
        });

        // kirim ke view: data hasil saringan + jenis yang diminta
        return view('produk.kategori', [
            'daftarUndangan' => $hasil,
            'jenis' => $jenis,
        ]);
    }
}