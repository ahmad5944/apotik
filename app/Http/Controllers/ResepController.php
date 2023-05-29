<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Resep;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep=\App\Resep::All();
        return view('admin.resep',['resep'=>$resep]);
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
        $tambah_resep=new \App\Resep;
        $tambah_resep->kd_rs = $request->addkdrs;
        $tambah_resep->tgl_rs = $request->addtglrs;
        $tambah_resep->nama = $request->addnama;
        $tambah_resep->umur = $request->addumur;
        $tambah_resep->telepon = $request->addtelepon;
        $tambah_resep->save();
        Alert::success('Tersimpan ','Data Resep Berhasil Disimpan');
        return redirect()->route('resep.index');
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
        $resep_edit = \App\Resep::findOrFail($id);
        return view('admin.editResep',['resep'=>$resep_edit]);
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
        $update_resep = \App\Resep::findOrFail($id);
        $update_resep->kd_rs=$request->get('addkdrs');
        $update_resep->tgl_rs=$request->get('addtglrs');
        $update_resep->nama=$request->get('addnama');
        $update_resep->umur=$request->input('addumur'); 
        $update_resep->telepon=$request->get('addtelepon');
        $update_resep->save();
        Alert::success('Update', 'Data Resep Berhasil Diupdate');
        return redirect()->route( 'resep.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep=\App\Resep::findOrFail($id);
        $resep->delete();
        Alert::success('Terhapus ','Data resep berhasil dihapus');
        return redirect()->route('resep.index');
    }
}
