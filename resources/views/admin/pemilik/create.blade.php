@extends('layouts.app')
@section('title', 'Tambah Pemilik')
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

                        <div class="mb-3">
                            <label for="no_wa" class="form-label">
                                Pemilik <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                            class="form-control @error('no_wa') is-invalid @enderror"
                            id="no_wa"
                            name="no_wa"
                            value="{{old('no_wa')}}"
                            placeholder="masukan nomer whatsapp anda"
                            required>
                            @error('kode')
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