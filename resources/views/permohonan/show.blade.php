@extends('layouts.templates')
@section('content')
    <div class="card">
        <div class="card-header">
            DETAIL PERMOHONAN
            @if (isset($ver->gambar))
                <a href="{{ url('permohonan/setujui/' . $id) }}" class="btn btn-sm btn-success float-right">Setujui</a>
            @endif
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Kegiatan</td>
                    <td>:</td>
                    <td>{{ $data->kegiatan }}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{ $data->lokasi }}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:</td>
                    <td>{{ $data->tgl_mulai . ' s/d ' . $data->tgl_selesai . ' / ' . $data->waktu . ' WITA' }}</td>
                </tr>

                <tr>
                    <td>Petugas</td>
                    <td>:</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top">Lampiran</td>
                    <td style="vertical-align: top">:</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ asset('uploads/img/' . $data->ktp) }}">
                                    <img src="{{ asset('uploads/img/' . $data->ktp) }}" width="200px">
                                </a>
                            </div>
                            <div class="col">
                                @if ($data->val_ktp === '-')
                                    <a href="" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                @elseif($data->val_ktp === 'disetujui')
                                    <i class="fas fa-check" style="color: rgb(55, 228, 64);"></i>
                                @else
                                    {{-- <i>x</i> --}}
                                    <i style="color: rgb(241, 1, 1);" class="fas fa-ban"></i>
                                @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a href="{{ asset('uploads/img/' . $data->kk) }}">
                                    <img src="{{ asset('uploads/img/' . $data->kk) }}" width="200px">
                                </a>
                            </div>
                            <div class="col">
                                @if ($data->val_ktp === '-')
                                    <a href="" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                @elseif($data->val_ktp === 'disetujui')
                                    <i class="fas fa-check" style="color: rgb(55, 228, 64);"></i>
                                @else
                                    {{-- <i>x</i> --}}
                                    <i style="color: rgb(241, 1, 1);" class="fas fa-ban"></i>
                                @endif
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a href="{{ asset('uploads/img/' . $data->sp) }}">
                                    <img src="{{ asset('uploads/img/' . $data->sp) }}" width="200px">
                                </a>
                            </div>
                            <div class="col">
                                @if ($data->val_ktp === '-')
                                    <a href="" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                @elseif($data->val_ktp === 'disetujui')
                                    <i class="fas fa-check" style="color: rgb(55, 228, 64);"></i>
                                @else
                                    {{-- <i>x</i> --}}
                                    <i style="color: rgb(241, 1, 1);" class="fas fa-ban"></i>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>Bukti Verifikasi Tempat</b></td>
                    <td>:</td>
                </tr>
                <tr>
                    <td> Gambar</td>
                    <td>:</td>
                    <td>
                        @if (isset($ver->gambar))
                            <img src="{{ asset('uploads/img/' . $ver->gambar) }}" width="200px" alt="">
                        @else
                            Belum ada bukti
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>
                        @if (isset($ver->keterangan))
                            {{ $ver->keterangan }}
                        @else
                            Belum ada keterangan
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Upload Berkas
                    </td>
                    <td>:</td>
                    <td>
                        @if (isset($hasil->id))
                            <a href="{{ asset('uploads/img/' . $hasil->hasil) }}">{{ $hasil->hasil }}</a>
                        @else
                            <form action="{{ url('permohonan/berkas-post/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col">
                                        <input type="file" name="file" id="berkas" class="form-control">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-success">simpan</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
