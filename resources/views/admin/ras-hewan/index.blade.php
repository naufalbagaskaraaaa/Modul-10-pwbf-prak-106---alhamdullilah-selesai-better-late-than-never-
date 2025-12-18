@extends('layouts.app')

@section('content')
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pemilik</th>
            <th>no. wa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rasHewan as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->nama_jenis_hewan}}</td>
            <td>{{$item->nama_ras}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection