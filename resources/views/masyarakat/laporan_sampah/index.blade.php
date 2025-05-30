@extends('layouts.master')

@section('title', 'Laporan Sampah Saya')

@section('content')
<div class="container mt-3">
    <h3>Laporan Sampah Saya</h3>
    <a href="{{ route('masyarakat.laporan_sampah.create') }}" class="btn btn-primary mb-3">Buat Laporan Baru</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis Sampah</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporans as $laporan)
            <tr>
                <td>{{ $laporan->jenis_sampah }}</td>
                <td>{{ Str::limit($laporan->deskripsi, 50) }}</td>
                <td>{{ $laporan->lokasi }}</td>
                <td>{{ ucfirst($laporan->status) }}</td>
                <td>
                  @if($laporan->foto)
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto" width="100">
                  @else
                    -
                  @endif
                </td>
                <td>{{ $laporan->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('masyarakat.laporan_sampah.show', $laporan->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada laporan sampah</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $laporans->links() }}
</div>
@endsection
