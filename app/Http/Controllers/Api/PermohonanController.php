<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PermohonanController extends Controller
{
    public function postPermohonan(Request $request)
    {
        $data = Permohonan::create([
            'penanggung_jawab' => $request->penanggung_jawab,
            'kegiatan' => $request->kegiatan,
            'lokasi' => $request->lokasi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'waktu' => $request->waktu,
            'pemohon_id' => $request->pemohon_id,
            'petugas_id' => 1,
            'ktp' => '-',
            'kk' => '-',
            'sp' => '-',
            'status' => 'diajukan'
        ]);

        if ($data) {
            return response()->json([
                'success' => 200,
                'message' => 'Successfuly',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => 500,
                'message' => "can't upload this file"
            ]);
        }
    }

    public function postKtp(Request $request)
    {
        $imageKtp = $request->ktp;
        $imageKtp = str_replace('data:image/png;base64,', '', $imageKtp);
        $imageKtp = str_replace(' ', '+', $imageKtp);
        $imageNameKtp = 'KTP' . date('dmYHis') . rand(0, 9999) . '.' . 'png';
        $save = File::put(public_path() . '/uploads/img/' . $imageNameKtp, base64_decode($imageKtp));
        $post = Permohonan::find($request->id);
        $post->ktp = $imageNameKtp;
        $post->update();

        if ($post) {
            return response()->json([
                'success' => 200,
                'message' => 'Successfuly',
                'data' => $post
            ]);
        } else {
            return response()->json([
                'success' => 500,
                'message' => "can't upload this file"
            ]);
        }
    }

    public function postKk(Request $request)
    {
        $imageKk = $request->kk;
        $imageKk = str_replace('data:image/png;base64,', '', $imageKk);
        $imageKk = str_replace(' ', '+', $imageKk);
        $imageNameKk = 'KK' . date('dmYHis') . rand(0, 9999) . '.' . 'png';
        $save = File::put(public_path() . '/uploads/img/' . $imageNameKk, base64_decode($imageKk));
        $post = Permohonan::find($request->id);
        $post->ktp = $imageNameKk;
        $post->update();

        if ($post) {
            return response()->json([
                'success' => 200,
                'message' => 'Successfuly',
                'data' => $post
            ]);
        } else {
            return response()->json([
                'success' => 500,
                'message' => "can't upload this file"
            ]);
        }
    }

    public function postSp(Request $request)
    {
        $imageSp = $request->sp;
        $imageSp = str_replace('data:image/png;base64,', '', $imageSp);
        $imageSp = str_replace(' ', '+', $imageSp);
        $imageNameSp = 'SP' . date('dmYHis') . rand(0, 9999) . '.' . 'png';
        $save = File::put(public_path() . '/uploads/img/' . $imageNameSp, base64_decode($imageSp));
        $post = Permohonan::find($request->id);
        $post->ktp = $imageNameSp;
        $post->update();

        if ($post) {
            return response()->json([
                'success' => 200,
                'message' => 'Successfuly',
                'data' => $post
            ]);
        } else {
            return response()->json([
                'success' => 500,
                'message' => "can't upload this file"
            ]);
        }
    }

    public function getPermohonan(Request $request)
    {
        $data = Permohonan::where('pemohon_id', $request->id)->get();
        if ($data) {
            return response()->json([
                'success' => 200,
                'message' => 'Successfuly',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => 500,
                'message' => "can't upload this file"
            ]);
        }
    }
}
