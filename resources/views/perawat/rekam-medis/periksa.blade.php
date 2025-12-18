@extends('layouts.lte.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pemeriksaan Awal: <strong>{{ $pasien->nama_hewan }}</strong></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('perawat.rekam-medis.update', $pasien->idrekam_medis) }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Anamnesa</label>
                    <textarea name="anamnesa" class="form-control" rows="3" required placeholder="Contoh: Hewan lemas, tidak nafsu makan..."></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Temuan Klinis</label>
                    <textarea name="temuan_klinis" class="form-control" rows="4" required placeholder="Contoh: Suhu 38.5 C, Berat 4 Kg, Detak jantung normal..."></textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Kirim ke Dokter</button>
                    <a href="{{ route('perawat.dashboard-perawat') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection