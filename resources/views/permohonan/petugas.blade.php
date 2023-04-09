@extends('layouts.templates')
@section('content')
    <div class="card">
        <div class="card-header">
            DETAIL PERMOHONAN
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-12">
                    <form action="{{ url('permohonan/set-petugas/' . $id) }}" method="post">
                        @csrf
                        <label for="petugas">Petugas</label>
                        <select name="petugas" class="form-control" id="petugas">
                            <option selected disabled>Pilih petugas</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success mt-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
