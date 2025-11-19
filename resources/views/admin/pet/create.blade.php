@extends('layouts.app')
@section('title', 'Tambah Data Pet')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Data Pet
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    <form action="{{route('admin.pet.store')}}" method="POST">
                        @csrf

                        <label for="idpemilik" class="form-label">
                                Nama Pemilik <span class="text-danger">*</span>
                            </label>
                            <select
                            class="form-control @error('idpemilik') is-invalid @enderror"
                            id="idpemilik"
                            name="idpemilik"
                            required>
                            <option value="">Pilih Pemilik</option>
                            @foreach($pemilik as $index => $item)
                                <option value="{{$item->idpemilik}}" {{ old('idpemilik') == $item->idpemilik?
                                    'selected' : ''}}>
                                    {{$item->user->nama}}
                                </option>
                            @endforeach
                            </select>    
                            @error('idpemilik')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        <label for="idras_hewan" class="form-label">
                                Nama Ras Hewan <span class="text-danger">*</span>
                            </label>
                            <select
                            class="form-control @error('idras_hewan') is-invalid @enderror"
                            id="idras_hewan"
                            name="idras_hewan"
                            required>
                            <option value="">Pilih Ras Hewan</option>
                            @foreach($rasHewan as $index => $item)
                                <option value="{{$item->idras_hewan}}" {{ old('idras_hewan') == $item->idras_hewan?
                                    'selected' : ''}}>
                                    {{$item->nama_ras}}
                                </option>
                            @endforeach
                            </select>    
                            @error('idras_hewan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror    

                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Nama Peliharaan Anda <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            value="{{old('nama')}}"
                            placeholder="masukan nama hewan peliharaan anda"
                            required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">
                                Tanggal Lahir Peliharaan Anda  <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{old('tanggal_lahir')}}"
                            placeholder="masukan tanggal lahir peliharaan anda"
                            required>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="warna_tanda" class="form-label">
                                Terangkan Warna Tanda Peliharaan Anda  <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('warna_tanda') is-invalid @enderror"
                            id="warna_tanda"
                            name="warna_tanda"
                            value="{{old('warna_tanda')}}"
                            placeholder="Tolong Terangkan Warna Tanda Peliharaan Anda"
                            required>
                            @error('warna_tanda')
                            <div class="invalid-feedback">
                                 {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">
                                 Jenis Kelamin Peliharaan Anda <span class="text-danger">*</span>
                            </label>
                            <select
                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            id="jenis_kelamin"
                            name="jenis_kelamin"
                            required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="J" {{ old('jenis_kelamin') == 'J' ? 'selected' : '' }}>
                                jantan
                            </option>
                            <option value="B" {{ old('jenis_kelamin') == 'B' ? 'selected' : '' }}>
                                betina
                            </option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                 {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-between">
                            <a href="{{route('admin.pemilik.index')}}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"> Kembali
                                </i>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection