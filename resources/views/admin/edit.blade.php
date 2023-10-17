@extends('layouts.app-master')

@section('title')
    Data Barang
@endsection

@section('content')
<div class="container">
    <!-- /.row -->
    <div class="row">
       <div class="col-12">
         <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', ["id" => $barang->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                            placeholder="Masukkan Kode Barang" value="{{ $barang->kode_barang }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                            placeholder="Masukkan nama barang">
                    </div>
                    <div class="form-group">
                        <label for="name">Jumlah Barang</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah"
                            placeholder="Masukkan jumlah barang">
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Gambar</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                          name="image" onchange="previewImage()">
                      @error('image')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
         </div>
         <!-- /.card -->
       </div>
     </div>
     <!-- /.row -->
</div>
@endsection