<div class="mb-3">
    <form action="{{route('admin.pet.create')}}" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data Pet
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