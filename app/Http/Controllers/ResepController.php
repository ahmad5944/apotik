<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Resep;
use App\Barang;
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
        $resep  = Resep::All();
        $obat   = Barang::All();

        return view('admin.resep', compact('resep','obat'));
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

        foreach ($request->addmore as $key => $value) {
            $tambah_resep           = new Resep;

            $tambah_resep->kd_brg   = $value['kd_brg'];
            $tambah_resep->qty      = $value['qty'];
            $tambah_resep->kd_rs    = $request->addkdrs;
            $tambah_resep->tgl_rs   = $request->addtglrs;
            $tambah_resep->nama     = $request->addnama;
            $tambah_resep->umur     = $request->addumur;
            $tambah_resep->telepon  = $request->addtelepon;
            $tambah_resep->save();
        }

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
        $resep_edit = Resep::findOrFail($id);
        $obat   = Barang::All();

        return view('admin.editResep',['resep' => $resep_edit, 'obat' => $obat]);
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
        $update_resep = Resep::findOrFail($id);
        $req = $request->all();

        $update_resep->kd_rs        = $request->get('addkdrs');
        $update_resep->tgl_rs       = $request->get('addtglrs');
        $update_resep->nama         = $request->get('addnama');
        $update_resep->umur         = $request->input('addumur'); 
        $update_resep->telepon      = $request->get('addtelepon');
        $update_resep->kd_brg       = $req['kd_brg'];
        $update_resep->qty          = $req['qty'];
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
        $resep = Resep::findOrFail($id);
        $resep->delete();
        Alert::success('Terhapus ','Data resep berhasil dihapus');
        return redirect()->route('resep.index');
    }
}
