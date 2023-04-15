<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->modul = 'Pengguna';
    }

    public function index()
    {
        $modul = $this->modul;
        $data = User::all();
        return view('pengguna.index',compact('data','modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = $this->modul;
        return view('pengguna.create', compact('modul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'=> $request->nama,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $request->role
        ]);
        return redirect(route('pengguna.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $modul = $this->modul;
        return view('pengguna.edit', compact('data', 'modul'));
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
        $edit = User::find($id);
        $edit->name =$request->nama;
        $edit->email =$request->email;
        $edit->password =Hash::make($request->password);
        $edit->role =$request->role;
        $edit->update();
        return redirect(route('pengguna.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != 1){
            $cek = Permohonan::where('petugas_id', $id)->get();
            if(isset($cek[0]->id)){
                return redirect(route('pengguna.index'));
            }else{
                // dd($cek);
                $hapus = User::find($id);
                $hapus->delete();
                return redirect(route('pengguna.index'));
            }
        }else{
            return redirect(route('pengguna.index'));
        }
    }
}
