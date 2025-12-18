@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">Data Pemilik Hewan</span>
            <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Tambah Pemilik
            </a>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama User (Akun)</th>
                            <th>No. WhatsApp</th>
                            <th>Alamat</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemilik as $p)
                        <tr>
                            <td>{{ $p->idpemilik }}</td>
                            <td class="font-weight-bold">{{ $p->nama_user }}</td>
                            <td>{{ $p->no_wa }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>
                                <a href="{{ route('resepsionis.pemilik.edit', $p->idpemilik) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('resepsionis.pemilik.destroy', $p->idpemilik) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pemilik ini? Data hewan milik dia mungkin akan error/hilang!');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Belum ada data pemilik.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection