@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">Daftar Temu Dokter (Antrian)</span>
            <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus-circle"></i> Buat Janji Baru
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Masuk</th>
                            <th>Nama Pasien (Pet)</th>
                            <th>Pemilik</th>
                            <th>Keluhan Awal</th>
                            <th>Status Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($temu_dokter as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                            <td class="font-weight-bold">{{ $item->nama_pet }}</td>
                            <td>{{ $item->nama_pemilik }}</td>
                            <td>{{Str::limit($item->anamnesa, 50) }}</td>
                            <td>{{ $item->diagnosa }}</td>
                            <td>
                                <a href="{{ route('resepsionis.temu-dokter.edit', $item->idrekam_medis) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('resepsionis.temu-dokter.destroy', $item->idrekam_medis) }}" 
                                    class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Yakin ingin menghapus antrian ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center">Belum ada antrian pasien.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection