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
        @foreach ($user as $index => $item)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
        </tr>
        @endforeach
    </tbody>
</table>