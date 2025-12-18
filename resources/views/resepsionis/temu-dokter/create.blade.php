@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-md-8 mx-auto">
        <div class="card-header font-weight-bold">Form Pendaftaran Temu Dokter</div>
        <div class="card-body">
            <form action="{{ route('resepsionis.temu-dokter.store') }}" method="POST">
                @csrf
                
                {{-- Pilih Pet --}}
                <div class="mb-3">
                    <label>Pilih Pasien (Pet) <span class="text-danger">*</span></label>
                    <select name="idpet" class="form-control select2 @error('idpet') is-invalid @enderror">
                        <option value="">-- Cari Nama Hewan --</option>
                        @foreach($pets as $pet)
                            <option value="{{ $pet->idpet }}">
                                {{ $pet->nama }} (Pemilik: {{ $pet->nama_pemilik }})
                            </option>
                        @endforeach
                    </select>
                    @error('idpet') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">Jika hewan belum ada, daftarkan dulu di menu Data Pasien.</small>
                </div>

                {{-- Input Keluhan --}}
                <div class="mb-3">
                    <label>Keluhan / Alasan Datang <span class="text-danger">*</span></label>
                    <textarea name="anamnesa" class="form-control @error('anamnesa') is-invalid @enderror" rows="4" placeholder="Contoh: Kucing muntah-muntah sejak pagi, tidak mau makan."></textarea>
                    @error('anamnesa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Daftarkan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection