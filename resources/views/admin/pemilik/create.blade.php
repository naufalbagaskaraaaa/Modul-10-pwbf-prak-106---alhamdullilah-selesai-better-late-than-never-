@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Pemilik
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    <form action="{{route('admin.pemilik.store')}}" method="POST">
                        @csrf

                        <label for="iduser" class="form-label">
                                Nama User <span class="text-danger">*</span>
                            </label>
                            <select type="text"
                            class="form-control @error('iduser') is-invalid @enderror"
                            id="iduser"
                            name="iduser"
                            required>
                            <option value="">Pilih User</option>
                            @foreach($user as $index => $item)
                                <option value="{{$item->iduser}}" {{ old('iduser') == $item->iduser?
                                    'selected' : ''}}>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                            </select>    
                            @error('iduser')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        <div class="mb-3">
                            <label for="no_wa" class="form-label">
                                Nomer Whatsapp <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('no_wa') is-invalid @enderror"
                            id="no_wa"
                            name="no_wa"
                            value="{{old('no_wa')}}"
                            placeholder="masukan nomer whatsapp anda"
                            required>
                            @error('no_wa')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                Alamat <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                            value="{{old('alamat')}}"
                            placeholder="masukan alamat anda"
                            required>
                            @error('alamat')
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