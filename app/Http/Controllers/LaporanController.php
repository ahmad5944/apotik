<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Jurnal;
use App\Lappenj;
use App\Datapenjualan;
use App\Lapobt;
use PDF;
use DB;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.laporan');
    }

    public function show(Request $request)
    {
        $periode=$request->get('periode');
        $jenis=$request->get('jenis');
        // test

        if($jenis=='cetak') {
            if($periode == 'All') {
                $bb = \App\Laporan::where('keterangan', '!=', 'Retur penjualan')->get();
                $akun=\App\Akun::All();
                $pdf = PDF::loadview('laporan.cetak',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
                return $pdf->stream(); 
            }elseif($periode == 'periode'){
                $tglawal=$request->get('tglawal');
                $tglakhir=$request->get('tglakhir');

                $akun=\App\Akun::All();
                $bb=DB::table('jurnal')
                    ->where('keterangan', '!=', 'Retur penjualan')
                    ->whereBetween('tgl_jurnal', [$tglawal,$tglakhir])
                    ->orderby('tgl_jurnal','ASC')
                    ->get();
                $pdf = PDF::loadview('laporan.cetak',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
                return $pdf->stream();
            }
        }elseif($jenis=='lappenj') {
            if($periode == 'All') {
                $data = \App\Datapenjualan::All();
                $lp = \App\Lappenj::All();
                $pdf = PDF::loadview('laporan.lappenj',['datapenjualan'=>$data, 'lappenj'=>$lp])->setPaper('A4','landscape');
                return $pdf->stream();
            }elseif($periode == 'periode'){
                $tglawal=$request->get('tglawal');
                $tglakhir=$request->get('tglakhir');
                $lp=\App\Lappenj::All();
                // dump($tglawal);
                // dump($tglakhir);
                $data=DB::table('datapenjualan')
                    ->whereBetween('tgl_jual', [$tglawal,$tglakhir])
                    ->orderby('tgl_jual','ASC')
                    ->get();
                    // dd($data);
                $pdf = PDF::loadview('laporan.lappenj',['datapenjualan'=>$data, 'lappenj'=>$lp])->setPaper('A4','landscape');
                return $pdf->stream();
            }
        }elseif($jenis=='kasmasuk') {
            if($periode == 'All') {
                $bb = \App\Laporan::where('keterangan', 'Kas')->get();
                $akun = \App\Akun::All();
                $km = \App\Kasmasuk::All();
                $keterangan=$request->get('kas');
                $pdf = PDF::loadview('laporan.kasmasuk',['laporan'=>$bb, 'kasmasuk'=>$km, 'akun'=>$akun, 'kas'=>$keterangan])->setPaper('A4','landscape');
                return $pdf->stream();
            }elseif($periode == 'periode'){
                $tglawal=$request->get('tglawal');
                $tglakhir=$request->get('tglakhir');
                $keterangan=$request->get ('kas');
                $km =\App\Kasmasuk::All();
                $akun = \App\Akun::All();
                // dump($tglawal);
                // dump($tglakhir);
                $bb=DB::table('jurnal')
                    ->whereBetween('tgl_jurnal', [$tglawal,$tglakhir])
                    ->orderby('tgl_jurnal','ASC')
                    ->get();
                    // dd($data);
                $pdf = PDF::loadview('laporan.kasmasuk',['laporan'=>$bb, 'kasmasuk'=>$km, 'akun'=>$akun, 'kas'=>$keterangan])->setPaper('A4','landscape');
                return $pdf->stream();
            }
        }elseif($jenis=='lapobt') {
            if($periode == 'All') {
                $data = \App\Datapenjualan::All();
                $lo = \App\Lapobt::All();
                $pdf = PDF::loadview('laporan.lapobt',['datapenjualan'=>$data, 'lapobt'=>$lo])->setPaper('A4','landscape');
                return $pdf->stream();
            }elseif($periode == 'periode'){
                $tglawal=$request->get('tglawal');
                $tglakhir=$request->get('tglakhir');
                $lo=\App\Lapobt::All();
                // dump($tglawal);
                // dump($tglakhir);
                $data=DB::table('datapenjualan')
                    ->whereBetween('tgl_jual', [$tglawal,$tglakhir])
                    ->orderby('tgl_jual','ASC')
                    ->get();
                    // dd($data);
                $pdf = PDF::loadview('laporan.lapobt',['datapenjualan'=>$data, 'lapobt'=>$lo])->setPaper('A4','landscape');
                return $pdf->stream();
            }
        }
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
