@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{-- Kartu Info Pasien --}}
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Info Pasien
                </div>
                <div class="card-body">
                    <h4 class="font-weight-bold">{{ $rekam->nama_pet }}</h4>
                    <hr>
                    <p><strong>Tanggal:</strong> <br> {{ \Carbon\Carbon::parse($rekam->created_at)->format('d F Y, H:i') }}</p>
                    <p><strong>Keluhan Awal:</strong> <br> {{ $rekam->anamnesa }}</p>
                </div>
            </div>

            <a href="{{ route('admin.transaksi.rekam') }}" class="btn btn-secondary btn-block">
                <i class="fas fa-arrow-left"></i> Kembali ke Arsip
            </a>
        </div>

        <div class="col-md-8">
            {{-- Kartu Hasil Pemeriksaan --}}
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    Hasil Pemeriksaan Dokter
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Temuan Klinis:</label>
                        <div class="p-2 bg-light border rounded">
                            {{ $rekam->temuan_klinis ?? '-' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Diagnosa:</label>
                        <div class="p-2 bg-light border rounded">
                            {{ $rekam->diagnosa ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kartu Detail Tindakan & Obat --}}
            <div class="card">
                <div class="card-header font-weight-bold">
                    Tindakan & Terapi (Resep)
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Tindakan / Obat</th>
                                <th>Detail (Dosis)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($details as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge badge-info">{{ $d->kode }}</span></td>
                                <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                                <td>{{ $d->detail }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Tidak ada tindakan atau obat tambahan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection