@extends('layouts.templates')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-bold">Data Permohonan</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Penanggung Jawab</th>
                        <th>Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->penanggung_jawab }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->lokasi }}</td>
                            @if ($item->tgl_mulai === $item->tgl_selesai)
                                <td>{{ $item->tgl_mulai . ' / ' . $item->waktu . 'WITA' }}</td>
                            @else
                                <td>{{ $item->tgl_mulai . ' s/d ' . $item->tgl_selesai . ' / ' . $item->waktu . 'WITA' }}
                                </td>
                            @endif
                            @if ($item->status === 'diajukan')
                                <td><span class="badge badge-primary">{{ $item->status }}</span></td>
                            @elseif($item->status === 'ditolak')
                                <td><span class="badge badge-danger">{{ $item->status }}</span></td>
                            @else
                                <td><span class="badge badge-success">{{ $item->status }}</span></td>
                            @endif
                            <td>
                                <a href="{{ route('permohonan.show', $item->id) }}"
                                    class="btn btn-sm btn-primary">Periksa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
