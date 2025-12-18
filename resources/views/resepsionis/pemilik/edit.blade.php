@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-md-8 mx-auto">
        <div class="card-header font-weight-bold">Edit Data Pemilik</div>
        <div class="card-body">
            
            {{-- Form Update mengarah ke route update dengan ID Pemilik --}}
            <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST">
                @csrf
                @method('PUT') {{-- Wajib untuk Update Data --}}
                
                {{-- Dropdown Pilih User --}}
                <div class="mb-3">
                    <label>Akun User (Login) <span class="text-danger">*</span></label>
                    <select name="iduser" class="form-control @error('iduser') is-invalid @enderror">
                        <option value="">-- Cari Nama User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->iduser }}" 
                                {{-- Logic: Jika ID User sama dengan data lama, maka SELECTED --}}
                                {{ old('iduser', $pemilik->iduser) == $user->iduser ? 'selected' : '' }}>
                                {{ $user->nama }} (Email: {{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('iduser') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Input No WA --}}
                <div class="mb-3">
                    <label>No. WhatsApp <span class="text-danger">*</span></label>
                    <input type="number" name="no_wa" 
                           class="form-control @error('no_wa') is-invalid @enderror" 
                           value="{{ old('no_wa', $pemilik->no_wa) }}"> {{-- Isi otomatis data lama --}}
                    @error('no_wa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Input Alamat --}}
                <div class="mb-3">
                    <label>Alamat Lengkap <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $pemilik->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection