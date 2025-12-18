@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-md-8 mx-auto">
        <div class="card-header font-weight-bold">Tambah Pemilik Baru</div>
        <div class="card-body">
            <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
                @csrf
                
                {{-- Dropdown Pilih User --}}
                <div class="mb-3">
                    <label>Pilih Akun User <span class="text-danger">*</span></label>
                    <select name="iduser" class="form-control @error('iduser') is-invalid @enderror">
                        <option value="">-- Cari Nama User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                                {{ $user->nama }} (Email: {{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('iduser') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">User harus terdaftar dulu di menu Admin User.</small>
                </div>

                {{-- Input No WA --}}
                <div class="mb-3">
                    <label>No. WhatsApp <span class="text-danger">*</span></label>
                    <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" value="{{ old('no_wa') }}">
                    @error('no_wa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Input Alamat --}}
                <div class="mb-3">
                    <label>Alamat Lengkap <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection