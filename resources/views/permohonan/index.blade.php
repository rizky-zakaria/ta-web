@extends('layouts.templates')
@section('content')
<div class="card">
  <div class="card-header">
    {{-- <a href="{{ route('pengguna.create') }}" class="btn btn-primary float-right">Tambah Pengguna</a> --}}
  </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-hover">

        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kegiatan</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Penyelenggara</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->jenis_kegiatan}}</td>
                <td>{{$item->lokasi}}</td>
                <td>{{$item->Tanggal}}</td>
                <td>{{$item->Penyelenggara}}</td>
                <td>{{$item->role}}</td>
                <td>
                  <a href="{{route('pengguna.edit', $item->id)}}" class="btn btn-success m-1"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('pengguna.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger m-1"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    
</div>    
@endsection