@extends('layouts.templates')
@section('content')
<div class="card">
    <form action="{{ route('pengguna.store') }}" method="post">
        @csrf
        <div class="card-header">
          <button type="submit"  class="btn btn-primary float-right">Simpan</button>
        </div>
          <div class="card-body">
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="name@example.com">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                  </select>
                </div>
          </div>
    </form>
</div>    
@endsection