@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Rekam Medis') }}</div>

                <div class="card-body">
                    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary mb-3">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Nama Pet</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Anamnesa</th>
                                <th>Diagnosa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data_pendaftaran as $pendaftaran)
                            <tr>
                                <td>{{ $pendaftaran->idrekam_medis }}</td>
                                <td>{{ $pendaftaran->pet->nama }}</td>
                                <td>{{ $pendaftaran->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $pendaftaran->anamnesa }}</td>
                                <td>{{ $pendaftaran->diagnosa }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pendaftaran terbaru mas</td>
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