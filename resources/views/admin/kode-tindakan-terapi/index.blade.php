<div class="mb-3">
    <form action="{{route('admin.kode-tindakan-terapi.create')}}" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kode Tindakan Terapi
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
            <th>aksi</th>
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
            <td>
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                    <i class="fas fa-trash"></i> edit
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('yakin nih mau dihapus?'))
                {document.getElementById('delete-form-{{$item->idkode_tindakan_terapi}}').submit();}">
                    <i class="fas fa-trash"></i> Hapus
                
            </button> 
            <form id="delete-form-{{$item->idkode_tindakan_terapi}}" action="#" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>