<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Jenis Hewan</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Jenis Hewan</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Tabel Data Jenis Hewan</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Nama</th>
                          <th style="width: 40px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($jenisHewan as $index => $item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$item->nama_jenis_hewan}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                                  <i class="fas fa-trash"></i> edit
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('yakin nih mau dihapus?'))
                                {document.getElementById('delete-form-{{$item->idjenis_hewan}}').submit();}">
                                  <i class="fas fa-trash"></i> Hapus
                                </button> 

                                <form id="delete-form-{{$item->idjenis_hewan}}" action="#" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                              </form>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.card -->
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>