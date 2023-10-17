@extends('layouts.app-master')

@section('title')
    Data Barang
@endsection

@section('content-header')
  <div class="col">
    <h3> 
        Selamat Datang {{ Auth::user()->name }} di Aplikasi Inventaris Barang     
    </h3>
  </div><!-- /.col -->
@endsection

@section('content')
<div class="container">
     <!-- /.row -->
     <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

        <button type="button" class="btn btn-primary"> <a href="{{ route('manager.create') }}"
          class="text-white">Tambah Barang</a></button>

      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Gambar</th>
              <th>Action</th>
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
                        <td>
                            <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                        </td>
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

