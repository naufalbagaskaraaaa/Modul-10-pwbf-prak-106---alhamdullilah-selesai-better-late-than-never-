@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Pet') }}</div>

                <div class="card-body">

                    <a href="{{ route('pemilik.dashboard-pemilik') }}" class="btn btn-secondary mb-3">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>

                    <ul class="list-group">
                        @forelse ($pets as $pet)
                            <li class="list-group-item">
                                <strong>{{ $pet->nama }}</strong>
                                <small class="text-muted">
                                    (Jenis Kelamin: {{ $pet->jenis_kelamin }}, Warna: {{ $pet->warna_tanda }})
                                </small>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Anda belum memiliki data pet mas</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection