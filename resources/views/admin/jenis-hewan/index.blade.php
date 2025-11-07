<div class="mb-3">
    <!-- ini button tambah jenis hewan, dengan mengambil route untuk insert data -->
     <form action="{{route('admin.jenis-hewan.create')}}" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Jenis Hewan
        </button>
     </form>
</div>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>no</th>
            <th>nama jenis hewan</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisHewan as $index => $hewan)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$hewan->nama_jenis_hewan}}</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                    <i class="fas fa-edit"></i> edit
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('yakin nih mau dihapus mas?'))
                {document.getElementById('delete-form-{{$hewan->idjenis_hewan}}').submit();}">
                    <i class="fas fa-trash"></i> hapus
                </button>
                <form id="delete-form-{{$hewan->idjenis_hewan}}" action="#" method="POST" style="display: none;">
                    @scrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>