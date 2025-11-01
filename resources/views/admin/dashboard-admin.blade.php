@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Administrator') }}
                    - {{session('user_name')}}
                </div>

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
                                <a href="{{route('admin.jenis-hewan.index')}}" class="btn btn-primary btn-block">
                                    <i class="fas fa-paw"></i> Jenis Hewan
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{route('admin.pemilik.index')}}" class="btn btn-success btn-block">
                                    <i class="fas fa-users"></i> Pemilik
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                            <a href="{{route('admin.kategori.index')}}" class="btn btn-info btn-block">
                                <i class="fas fa-tags"></i> Kategori
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.kategori-klinis.index')}}" class="btn btn-warning btn-block">
                                <i class="fas fa-notes-medical"></i> Kategori Klinis
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.kode-tindakan-terapi.index')}}" class="btn btn-danger btn-block">
                                <i class="fas fa-briefcase-medical"></i> Kode Tindakan Terapi
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.pet.index')}}" class="btn btn-primary btn-block">
                                <i class="fas fa-dog"></i> Data Pet
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.ras-hewan.index')}}" class="btn btn-secondary btn-block">
                                <i class="fas fa-dna"></i> Ras Hewan
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.user.index')}}" class="btn btn-dark btn-block">
                                <i class="fas fa-user-cog"></i> User Management
                            </a>
                        </div>
                        
                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.role.index')}}" class="btn btn-info btn-block">
                                <i class="fas fa-user-tag"></i> Role Management
                            </a>
                        </div>

                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.user-role.index')}}" class="btn btn-warning btn-block">
                                <i class="fas fa-users-cog"></i> User Role
                            </a>
                        </div>
                        <div class="col-md-12 mb-2">
                            <a href="{{route('admin.dashboard-admin')}}" class="btn btn-warning btn-block">
                                <i class="fas fa-users-cog"></i> Dashboard Administrator
                            </a>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
