@extends('layouts.app')
<div class="mb-3">
    <form action="{{route('admin.pemilik.create')}}" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pemilik
        </button>
    </form>
</div>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pemilik</th>
            <th>no. wa</th>
            <th>alamat</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemilik as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->no_wa}}</td>
            <td>{{$item->alamat}}</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                    <i class="fas fa-trash"></i> edit
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('yakin nih mau dihapus?'))
                {document.getElementById('delete-form-{{$item->idpemilik}}').submit();}">
                    <i class="fas fa-trash"></i> Hapus
                
            </button> 
            <form id="delete-form-{{$item->idpemilik}}" action="#" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </td>
        </tr>
        @endforeach
    </tbody>
</table>