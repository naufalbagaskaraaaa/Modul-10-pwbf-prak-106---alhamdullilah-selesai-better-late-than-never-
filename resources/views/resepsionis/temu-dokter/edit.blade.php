@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-md-8 mx-auto">
        <div class="card-header font-weight-bold">Edit Pendaftaran</div>
        <div class="card-body">
            <form action="{{ route('resepsionis.temu-dokter.update', $temu->idrekam_medis) }}" method="POST">
                @csrf 
                
                <div class="mb-3">
                    <label>Pilih Pet</label>
                    <select name="idpet" class="form-control">
                        @foreach($pets as $pet)
                            <option value="{{ $pet->idpet }}" {{ $temu->idpet == $pet->idpet ? 'selected' : '' }}>
                                {{ $pet->nama }} ({{ $pet->nama_pemilik }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Keluhan</label>
                    <textarea name="anamnesa" class="form-control" rows="4">{{ $temu->anamnesa }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection