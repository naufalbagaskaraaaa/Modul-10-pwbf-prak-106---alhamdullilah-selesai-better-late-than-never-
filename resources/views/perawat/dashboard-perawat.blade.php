@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Perawat') }} - {{session('user_name')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{session('user_role_name')}}

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                @foreach($antrian as $item)
                                    <div class="card mb-2 p-3">
                                        <p>Pasien: {{ $item->nama_hewan }} ({{ $item->nama_pemilik }})</p>
                                        <a href="{{ route('perawat.periksa', $item->idrekam_medis) }}" class="btn btn-primary">
                                            Rekam Medis
                                         </a>
                                    </div>
                                    @endforeach
            
                                @if($antrian->isEmpty())
                                <p>Tidak ada antrean pending saat ini.</p>
                                @endif
                           </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection