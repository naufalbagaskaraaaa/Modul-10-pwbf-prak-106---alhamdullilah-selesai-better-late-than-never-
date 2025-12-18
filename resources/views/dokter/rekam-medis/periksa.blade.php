@extends('layouts.lte.main')

@section('content')
<form action="{{ route('dokter.rekam-medis.update', $pasien->idrekam_medis) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Hasil Perawat:</label>
        <p>Anamnesa: {{ $pasien->anamnesa }} | Temuan: {{ $pasien->temuan_klinis }}</p>
    </div>
    <div class="mb-3">
        <label>Diagnosa Dokter</label>
        <textarea name="diagnosa" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Tindakan / Terapi</label>
        <select name="idkode_tindakan_terapi" class="form-control">
            @foreach($tindakan as $t)
                <option value="{{ $t->idkode_tindakan_terapi }}">{{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan & Selesai</button>
</form>

@endsection