@extends('layouts.app')
@section('title', 'Tambah Kode Tindakan Terapi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Kode Tindakan Terapi
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    <form action="{{route('admin.kode-tindakan-terapi.store')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode" class="form-label">
                                Kode Tindakan Terapi <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('kode') is-invalid @enderror"
                            id="kode"
                            name="kode"
                            value="{{old('kode')}}"
                            placeholder="masukan kode tindakan terapi"
                            required>
                            @error('kode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                            <label for="deskripsi_tindakan_terapi" class="form-label">
                                Deskripsi Terapi <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                            id="deskripsi_tindakan_terapi"
                            name="deskripsi_tindakan_terapi"
                            value="{{old('deskripsi_tindakan_terapi')}}"
                            placeholder="masukan dekripsi tindakan terapi"
                            required>
                            @error('deskripsi_tindakan_terapi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                            <label for="idkategori" class="form-label">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select type="text"
                            class="form-control @error('idkategori') is-invalid @enderror"
                            id="idkategori"
                            name="idkategori"
                            required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $index => $item)
                                <option value="{{$item->idkategori}}" {{ old('idkategori') == $item->idkategori?
                                    'selected' : ''}}>
                                    {{$item->nama_kategori}}
                                </option>
                            @endforeach
                            </select>    
                            @error('idkategori')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                            <label for="idkategori_klinis" class="form-label">
                                Kategori Klinis <span class="text-danger">*</span>
                            </label>
                            <select type="text"
                            class="form-control @error('idkategori_klinisi') is-invalid @enderror"
                            id="idkategori_klinis"
                            name="idkategori_klinis"
                            required>
                            <option value="">Pilih Kategori Klinis</option>
                            @foreach($kategoriKlinis as $index => $item)
                                <option value="{{$item->idkategori_klinis}}" {{ old('idkategori_klinis') == $item->idkategori_klinis ?
                                    'selected' : ''}}>
                                    {{$item->nama_kategori_klinis}}
                                </option>
                            @endforeach
                            </select>    
                            @error('idkategori_klinis')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{route('admin.kode-tindakan-terapi.index')}}" class="btn btn-secondary">
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