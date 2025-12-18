@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Hewan Peliharaan Saya') }}</div>

                <div class="card-body">
                    <a href="{{ route('pemilik.dashboard-pemilik') }}" class="btn btn-secondary mb-3">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th>Nama Hewan</th>
                                    <th>Ras / Jenis</th>
                                    <th>Warna</th>
                                    <th>Gender</th>
                                    <th>Tgl Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pets as $pet)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>                            
                                    <td class="font-weight-bold">{{ $pet->nama }}</td>
                                    <td>{{ $pet->nama_ras ?? '-' }}</td>                                    
                                    <td>{{ $pet->warna_tanda }}</td>                                   
                                    <td class="text-center">
                                        @if($pet->jenis_kelamin == 'J')
                                            <span class="badge badge-primary">Jantan</span>
                                        @else
                                            <span class="badge badge-danger">Betina</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $pet->tanggal_lahir }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        <em>Anda belum mendaftarkan hewan peliharaan.</em>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection