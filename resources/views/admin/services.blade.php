@include('admin.partials')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambahkan Data</button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Teks Deskripsi</th>
                    <th>Poin Deskripsi</th> 
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $dt)
                  <tr>
                    <td>{{ $dt['id'] }}</td>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['description_text'] }}</td>
                    {{-- <td>{{ $dt['description_poin'] }}</td> --}}
                    <td>
                      @foreach($dt['description_poin'] as $poin)
                        <span>{{ $poin }}</span><br>
                      @endforeach
                    </td>
                    <td>{{ $dt['price'] }}</td>
                    <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUpdate{{ $dt['id'] }}">Edit</button>
                      || 
                      <a href="/admin-services/{{ $dt['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal Tambah Dataset -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('admin-services') }}" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputServiceName">Nama Layanan</label>
                        <input type="text" class="form-control" id="inputServiceName" name="name" placeholder="Nama Layanan">
                      </div>
                      <div class="form-group">
                        <label for="inputServiceDescriptionText">Deskripsi Layanan</label>
                        <input type="text" class="form-control" id="inputServiceDescriptionText" name="description_text" placeholder="Deskripsi Layanan">
                      </div>
                      <div class="form-group">
                        <label for="inputServiceDescriptionPoin">Keterangan Layanan</label>
                        {{-- <input type="text" class="form-control" id="inputServiceDescriptionPoin" name="description_poin" placeholder="Keterangan Layanan"> --}}
                        <div id="poin-container">
                          <input type="text" class="form-control"  id="inputServiceDescriptionPoin" name="description_poin[]" placeholder="Masukkan poin pertama">
                        </div>
                        <button type="button" id="add-poin">Tambah Poin</button>
                      </div>
                      <div class="form-group">
                        <label for="inputServicePrice">Harga Layanan</label>
                        <input type="text" class="form-control" id="inputServicePrice" name="price" placeholder="Harga Layanan">
                      </div>
                      <div class="form-group">
                        <label for="picture">Pilih Gambar</label>
                        <input type="file" class="form-control" id="picture" name="picture" required>
                    </div>
                    </div>
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Update Data -->
  @foreach ($data as $dt)
  <div id="modalUpdate{{ $dt['id']}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form method="POST" action="admin-services/{{ $dt['id'] }}">
                      @csrf
                      @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputIdService">Id</label>
                        <input type="text" class="form-control" value="{{ $dt['id'] }}" id="inputIdData" name="id" readonly>
                      </div>  
                      <div class="form-group">
                        <label for="inputServiceName">Nama Layanan</label>
                        <input type="text" class="form-control" value="{{ $dt['name']}}" id="inputServiceName" name="name" placeholder="Nama Layanan">
                      </div>
                      <div class="form-group">
                        <label for="inputServiceDescriptionText">Deskripsi Layanan</label>
                        <input type="text" class="form-control" value="{{ $dt["description_text"]}}" id="inputServiceDescriptionText" name="description_text" placeholder="Deskripsi Layanan">
                      </div>
                      <div class="form-group">
                        <label for="inputServiceDescriptionPoin">Keterangan Layanan</label>
                        {{-- <input type="text" class="form-control" id="inputServiceDescriptionPoin" name="description_poin" placeholder="Keterangan Layanan"> --}}
                        <div id="poin-container">
                          @foreach ($dt['description_poin'] as $poin)
                          <input type="text" class="form-control" value="{{ $poin }}"  id="inputServiceDescriptionPoin" name="description_poin[]" placeholder="Masukkan poin pertama">
                          @endforeach
                        </div>
                      <button type="button" id="add-poin">Tambah Poin</button>
                      </div>
                      <div class="form-group">
                        <label for="inputServicePrice">Harga Layanan</label>
                        <input type="text" class="form-control" value="{{ $dt["price"]}}" id="inputServicePrice" name="price" placeholder="Harga Layanan">
                      </div>
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte_asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('lte_asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('lte_asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte_asset/dist/js/adminlte.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  //bagian poin di description poin
  document.getElementById('add-poin').addEventListener('click', function() {
    let container = document.getElementById('poin-container');
    let newInput = document.createElement('div');
    newInput.innerHTML = `
        <input type="text" name="description_poin[]" placeholder="Masukkan poin tambahan">
        <button type="button" class="remove-poin">Hapus</button>
    `;
    container.appendChild(newInput);

    // Tambahkan event listener untuk tombol hapus
    newInput.querySelector('.remove-poin').addEventListener('click', function() {
        newInput.remove();
    });
});
</script>
</body>
</html>
