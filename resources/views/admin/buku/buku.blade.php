@extends('master.master')

@section('title')
 <title>Buku Cetak</title>
 <!-- Custom styles for this page -->

@endsection

@section('content')
          <!-- Begin Page Content -->

            <!-- Topbar Search -->

            <div class="card-body text-right ">
              <a href="{{route('admin.buku.tambahbuku')}}" class="btn btn-primary">
                <span class="text">Tambah Buku Cetak</span>
              </a>
              </div>

          <div class="container-fluid">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Buku Cetak</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul buku</th>
                          <th>Cover buku</th>
                          <th>Kategori</th>
                          <th>Nama pengarang</th>
                          <th>Tahun terbit</th>
                          <th>Penerbit</th>
                          <th>Jumlah halaman</th>
                          <th>Jumlah buku</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($buku as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->judul_buku }}</td>
                          <td><img src="{{asset('img/buku/'. $item->foto_cover)}}" width="20"></td>
                          <td>{{ $item->nama_kategori }}</td>
                          <td>{{ $item->nama_pengarang }}</td>
                          <td>{{ $item->tahun_terbit }}</td>
                          <td>{{ $item->penerbit }}</td>
                          <td>{{ $item->jumlah_halaman }}</td>
                          <td>{{ $item->jumlah_buku }}</td>
                          <td><a href="{{ route('admin.buku.editbuku',[$item->buku_id])}}" class="btn btn-info"><span class="text">Edit</span></a>
                            <a href="{{route('admin.buku.hapusbuku', [$item->buku_id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin Menghapus ?')">Hapus</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->
@endsection

