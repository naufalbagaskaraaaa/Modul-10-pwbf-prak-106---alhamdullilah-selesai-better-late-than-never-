@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header font-weight-bold">
            <i class="fas fa-notes-medical"></i> Arsip Data Rekam Medis
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal Periksa</th>
                            <th>Hewan</th>
                            <th>Keluhan (Anamnesa)</th>
                            <th>Diagnosa Dokter</th>
                            <th>Dokter Pemeriksa</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                            <td class="font-weight-bold">{{ $item->nama_pet }}</td>
                            <td>{{ Str::limit($item->anamnesa, 40) }}</td>
                            <td>{{ Str::limit($item->diagnosa, 40) }}</td>
                            <td>{{ $item->nama_dokter ?? '-' }}</td>
                            <td>
                                {{-- Tombol Detail --}}
                                <a href="{{ route('admin.transaksi.rekam.show', $item->idrekam_medis) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Detail
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.transaksi.rekam.destroy', $item->idrekam_medis) }}" method="POST" class="d-inline" onsubmit="return confirm('PERINGATAN: Menghapus Rekam Medis akan menghapus detail obat/tindakan juga. Lanjutkan?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data rekam medis.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection