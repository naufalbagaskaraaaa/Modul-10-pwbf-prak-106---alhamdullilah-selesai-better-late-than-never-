@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Form Pendaftaran Hewan Baru</div>
                <div class="card-body">
                    
                    <form action="{{ route('resepsionis.pet.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Hewan <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: Bleki">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Pemilik <span class="text-danger">*</span></label>
                            <select name="idpemilik" class="form-control @error('idpemilik') is-invalid @enderror">
                                <option value="">-- Pilih Pemilik Terdaftar --</option>
                                @foreach($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                        {{ $p->nama }} (ID: {{ $p->idpemilik }})
                                    </option>
                                @endforeach
                            </select>
                            @error('idpemilik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Ras Hewan <span class="text-danger">*</span></label>
                            <select name="idras_hewan" class="form-control @error('idras_hewan') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Ras --</option>
                                @foreach($ras_hewan as $r)
                                    <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                                        {{ $r->nama_ras }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idras_hewan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Warna / Ciri Khas <span class="text-danger">*</span></label>
                            <input type="text" name="warna_tanda" class="form-control @error('warna_tanda') is-invalid @enderror" value="{{ old('warna_tanda') }}">
                            @error('warna_tanda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="d-block">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="J" {{ old('jenis_kelamin') == 'J' ? 'checked' : '' }}>
                                <label class="form-check-label">Jantan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="B" {{ old('jenis_kelamin') == 'B' ? 'checked' : '' }}>
                                <label class="form-check-label">Betina</label>
                            </div>
                            @error('jenis_kelamin') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection