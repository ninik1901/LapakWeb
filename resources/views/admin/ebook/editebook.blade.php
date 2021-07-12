@extends('master.master')

@section('title')
 <title>Edit Ebook</title>
@endsection

@section('content')
        <!-- Begin Page Content -->
        <div class="content mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Ebook</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('admin.ebook.updateebook', [$ebook->id])}}" method="post" enctype="multipart/form-data"class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Judul Buku</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="judul_buku" placeholder="Judul Buku" class="form-control" value="{{$ebook->judul_buku}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class="form-control-label">Kategori Buku</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kategori_id" id="select" class="form-control">
                                        @foreach ($kategori as $item)
                                            <option value="{{$item->id}}" @if($ebook->kategori_id == $item->id) {{'selected="selected"'}} @endif>{{$item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">Nama Pengarang</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="nama_pengarang" placeholder="Nama Pengarang" class="form-control" value="{{$ebook->nama_pengarang}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">Tahun Terbit</label></div>
                                <div class="col-12 col-md-9"><input type="number" name="tahun_terbit" placeholder="Tahun Terbit" class="form-control" value="{{$ebook->tahun_terbit}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">Penerbit</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="penerbit" placeholder="Penerbit" class="form-control" value="{{$ebook->penerbit}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">Jumlah Halaman</label></div>
                                <div class="col-12 col-md-9"><input type="number" name="jumlah_halaman" placeholder="Jumlah Halaman" class="form-control" value="{{$ebook->jumlah_halaman}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">Jumlah Buku</label></div>
                                <div class="col-12 col-md-9"><input type="number" name="jumlah_buku" placeholder="Jumlah Buku" class="form-control" value="{{$ebook->jumlah_buku}}"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">File Ebook</label></div>
                                <div class="col-12 col-md-9"><input type="file" name="file_ebook" class="form-control"><small value="{{$ebook->file_ebook}}" class="form-text text-muted">Masukkan foto cover disini</small></div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
                                <a href="{{route('admin.ebook.ebook')}}" type="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>

<!-- End of Main Content -->
@endsection
