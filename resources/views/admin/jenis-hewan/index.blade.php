<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>
                no
            </th>
            <th>
                nama jenis hewan
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisHewan as $index => $hewan)
        <tr>
            <td>
                {{$index+1}}
            </td>
            <td>
                {{$hewan->nama_jenis_hewan}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>