@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Rekam Medis yang dilihat dokter') }}</div>

                <div class="card-body">

                    <a href="{{ route('dokter.dashboard-dokter') }}" class="btn btn-secondary mb-3">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>

                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pet</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Anamnesa</th>
                                <th>Diagnosa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftar_rekam_medis as $rekamMedis)
                            <tr>
                                <td>{{ $rekamMedis->idrekam_medis }}</td>
                                <td>{{ $rekamMedis->pet->nama }}</td>
                                <td>{{ $rekamMedis->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $rekamMedis->anamnesa }}</td>
                                <td>{{ $rekamMedis->diagnosa }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data kunjungan broo</td>
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