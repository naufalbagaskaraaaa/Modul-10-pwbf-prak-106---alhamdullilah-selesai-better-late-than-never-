@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">Data Pasien (Pet)</span>
            <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Hewan Baru
            </a>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Hewan</th>
                            <th>Jenis/Ras</th>
                            <th>Pemilik</th>
                            <th>Gender</th>
                            <th>Warna</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td>{{ $pet->idpet }}</td>
                            <td class="font-weight-bold">{{ $pet->nama }}</td>
                            <td>{{ $pet->nama_ras }}</td>
                            <td>{{ $pet->nama_pemilik }}</td>
                            <td>
                                @if($pet->jenis_kelamin == 'J') 
                                    Jantan
                                @else 
                                    Betina
                                @endif
                            </td>
                            <td>{{ $pet->warna_tanda }}</td>
                            <td>
                                <a href="{{ route('resepsionis.pet.edit', $pet->idpet) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}" method="POST" class="d-inline" 
                                onsubmit="return confirm('Yakin ingin menghapus hewan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data hewan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection