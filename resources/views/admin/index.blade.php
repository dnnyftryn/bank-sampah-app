@extends('layouts.app-master')

@section('title')
    Data Barang
@endsection

@section('content-header')
  <div class="col">
    <h3> 
        Selamat Datang {{ Auth::user()->name }} di Galeri Bunga
    </h3>
  </div><!-- /.col -->
@endsection

@section('content')
<div class="container">
     <!-- /.row -->
     <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

        <button type="button" class="btn btn-primary"> <a href="{{ route('admin.create') }}"
          class="text-white">Tambah Bunga</a></button>

      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kode Bunga</th>
              <th>Nama Bunga</th>
              <th>Qty</th>
              <th>Gambar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td><img src="{{ asset('storage/' . $item->image) }}" alt="" width="100px"></td>
                    </tr>
                    @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
      <!-- /.row -->
</div>
@endsection