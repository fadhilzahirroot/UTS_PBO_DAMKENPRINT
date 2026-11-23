<h1>Undangan Jenis: {{ $jenis }}</h1>

@if (count($daftarUndangan) === 0)
    <p>Belum ada undangan untuk jenis ini.</p>
@else
    <ul>
        @foreach ($daftarUndangan as $undangan)
            <li>{{ $undangan['nama'] }} — Rp {{ number_format($undangan['harga'], 0, ',', '.') }}</li>
        @endforeach
    </ul>
@endif 