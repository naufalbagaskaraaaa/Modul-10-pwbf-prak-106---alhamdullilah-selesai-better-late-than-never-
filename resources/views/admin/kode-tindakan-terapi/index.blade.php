<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pemilik</th>
            <th>no. wa</th>
            <th>alamat</th>
            <th>alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kodeTindakanTerapi as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->kategori->nama_kategori}}</td>
            <td>{{$item->kategori_klinis->nama_kategori_klinis}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->deskripsi_tindakan_terapi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>