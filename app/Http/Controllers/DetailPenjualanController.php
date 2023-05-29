<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPenjualan;
use App\Penjualan;
use Alert;


class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function simpan(Request $request)
    {
        //Simpan ke table pemesanan
        $tambah_penjualan=new \App\Penjualan;
        $tambah_penjualan->no_jual = $request->no_jual;
        $tambah_penjualan->tgl_jual = $request->tgl;
        $tambah_penjualan->total = $request->total;
        $tambah_penjualan->kd_rs = $request->rs;
        $tambah_penjualan->save();
        //SIMPAN DATA KE TABEL DETAIL
        $kd_brg = $request->kd_brg;
        $qty= $request->qty_jual;
        $sub_total= $request->sub_total;
        foreach($kd_brg as $key => $no)
        {
            $input['no_jual'] = $request->no_jual;
            $input['kd_brg'] = $kd_brg[$key];
            $input['qty_jual'] = $qty[$key];
            $input['subtotal'] = $sub_total[$key];
            DetailPenjualan::insert($input);            
        }
                Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/transaksi');

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
}
