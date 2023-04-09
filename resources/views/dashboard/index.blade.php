@extends('layouts.templates')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>
                Selamat Datang, <b>{{ Auth::user()->name }}!</b>
            </h3>
        </div>
    </div>
@endsection
