<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pemilik</th>
            <th>no. wa</th>
            <th>alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userRole as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->user->nama}}</td>
            <td>{{$item->role->nama_role}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>