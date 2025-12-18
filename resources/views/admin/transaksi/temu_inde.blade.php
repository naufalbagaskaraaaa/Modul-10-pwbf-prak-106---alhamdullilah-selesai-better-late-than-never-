@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header font-weight-bold">
            <i class="fas fa-calendar-check"></i> Monitoring Temu Dokter (Antrian)
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Waktu Daftar</th>
                            <th>Nama Pasien (Pet)</th>
                            <th>Dokter Tujuan</th>
                            <th>Status</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d M Y, H:i') }}</td>
                            <td class="font-weight-bold">{{ $item->nama_pet }}</td>
                            <td>{{ $item->nama_dokter ?? 'Belum Dipilih' }}</td>
                            <td>
                                @if($item->status == 'A')
                                    <span class="badge badge-warning">Menunggu (Antre)</span>
                                @else
                                    <span class="badge badge-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.transaksi.temu.destroy', $item->idreservasi_dokter) }}" method="POST" onsubmit="return confirm('Hapus antrian ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada antrian pasien.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection