@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Resepsionis') }}
                    - {{session('user_name')}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{session('user_role_name')}}

                    <div class="mt-4">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <a href="{{ route('resepsionis.pendaftaran.pendaftaran') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-clipboard-list"></i> Rekam Medis
                                </a>
                            </div>    

                            <div class="col-md-12 mb-2">    
                                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-info ml-2">
                                    <i class="fas fa-paw"></i> Data Pet
                                </a>
                            </div>

                            <div class="col-md-12 mb-2">
                                <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-success ml-2">
                                    <i class="fas fa-users"></i> Data Pemilik
                                </a>
                            </div>

                            <div class="col-md-12 mb-2">
                                <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-primary ml-2">
                                    <i class="fas fa-calendar-check"></i> Temu Dokter
                                </a>
                            </div>

                            <div>
                            <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-plus"></i> Pendaftaran Baru
                            </a>
                            <div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
