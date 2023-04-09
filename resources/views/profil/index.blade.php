@extends('layouts.templates')
@section('content')
    <div class="card">
        <form action="{{ route('profil.update', Auth::user()->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-header">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col">
                        <label for="password">Password Konfirmasi</label>
                        <input type="password" name="konfirmasi" id="konfirmasi" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
