<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pemilik</th>
            <th>no. wa</th>
            <th>alamat</th>
            <th>alamat</th>
            <th>alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pet as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->tanggal_lahir}}</td>
            <td>{{$item->warna_tanda}}</td>
            <td>{{$item->pemilik->user->nama}}</td>
            <td>{{$item->ras_hewan->nama_ras}}</td>
        </tr>
        @endforeach
    </tbody>
</table>