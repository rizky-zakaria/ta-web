<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Alert;
use App\Models\Hasil;
use App\Models\User;
use App\Models\Verifikas;
use Illuminate\Support\Facades\File;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = 'permohonan';
    }

    public function setPetugas($id)
    {
        $modul = $this->modul;
        Alert::info('Perhatian', 'Silahkan Mengisi Petugas Lapangan Terlebih Dahulu');
        $data = User::where('role', 'petugas')->get();
        return view('permohonan.petugas', compact('id', 'data', 'modul'));
    }

    public function updatePetugas(Request $request, $id)
    {
        $set = Permohonan::find($id);
        $set->petugas_id = $request->petugas;
        $set->update();
        if ($set) {
            Alert::success('Berhasil', 'Berhasil Mengisi Form Petugas');
        } else {
            Alert::wrong('Gagal', 'Gagal Mengisi Form Petugas');
        }
        return redirect(route('permohonan.index'));
    }

    public function index()

    {
        $modul = $this->modul;
        $data = Permohonan::orderBy('created_at', 'desc')->get();
        return view('permohonan.index', compact('modul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modul = $this->modul;
        $data = Permohonan::join('users', 'users.id', '=', 'permohonans.petugas_id')
            ->where('permohonans.id', $id)
            ->first(['permohonans.*', 'users.name']);
        $hasil = Hasil::where('permohonan_id', $id)->first();
        // dd($data);
        if ($data->petugas_id == 1) {
            return redirect(url('permohonan/petugas/' . $id));
        } else {
            $ver = Verifikas::where('permohonan_id', $id)->first();
            return view('permohonan.show', compact('data', 'modul', 'id', 'ver', 'hasil'));
        }
    }

    public function setujui($id)
    {
        $data = Permohonan::find($id);
        $data->status = 'disetujui';
        $data->update();
        if ($data) {
            Alert::success('Berhasil', 'Berhasil menyetujui permohonan');
        } else {
            Alert::success('Berhasil', 'Berhasil menyetujui permohonan');
        }

        return redirect(route('permohonan.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postBerkas(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/img');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'img' . date('dmYHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {

                Hasil::create([
                    'permohonan_id' => $id,
                    'hasil' => $rename
                ]);
                Alert::success('Berhasil', 'Berhasil mengupload data');
                return redirect(route('permohonan.index'));
            } else {
                Alert::wrong('Error', 'Gagal mengupload data');
                return redirect(route('permohonan.index'));
            }
        } else {
            Alert::wrong('Error', 'Gagal mengupload data');
            return redirect(route('permohonan.index'));
        }
    }
}
