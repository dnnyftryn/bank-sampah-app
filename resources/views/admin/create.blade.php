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

                 <!-- Way 1: Display All Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                            placeholder="Masukkan Kode Barang">
                        
                        @error('kode_barang')

                        <div class="alert alert-danger mt-2">
                            {{ $message }}

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                            placeholder="Masukkan nama barang">

                        @error('nama_barang')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Jumlah Barang</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah"
                            placeholder="Masukkan jumlah barang">
                        
                        @error('jumlah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}

                        @enderror
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