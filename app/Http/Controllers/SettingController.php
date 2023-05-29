<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Akun;
use App\Setting;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Akun::All();
        $setting=\App\Setting::All();
        return view('admin.setting' , ['akun' => $akun, 'setting'=> $setting]);
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
        $tambah_setting=new \App\Setting;
        $tambah_setting->id_setting = $request->addid;
        $tambah_setting->no_akun = $request->addnoakun;
        $tambah_setting->nama_transaksi = $request->addnama;
        $tambah_setting->save();
        Alert::success('Pesan ','Data Berhasil Disimpan');
        return redirect()->route('setting.index');
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
        $akun=\App\Akun::All();
        $setting_edit = \App\Setting::findOrFail($id);
        return view('admin.editSetting',['akun' => $akun, 'setting'=> $setting_edit]);
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
        $update_setting = \App\Setting::findOrFail($id);
        $update_setting->id_setting=$request->get('addid');
        $update_setting->no_akun=$request->get('addnoakun');
        $update_setting->nama_transaksi=$request->get('addnama');
        $update_setting->save();
        Alert::success('Update', 'Data Berhasil Diupdate');
        return redirect()->route( 'setting.index');


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
}