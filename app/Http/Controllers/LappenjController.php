<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lappenj;
use App\Datapenjualan;
use PDF;
use DB;

class LappenjController extends Controller
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
    public function show(Request $request)
    {
        $periode=$request->get('periode');
                if($periode == 'All')
                    {
                    $bb = \App\Lappenj::All();
                    $data=\App\Datapenjualan::All();
                    $pdf = PDF::loadview('lappenj.lappenj_pdf',['lappenj'=>$bb,'datapenjualan' => $data])->setPaper('A4','landscape');
                    return $pdf->stream(); 
                }elseif($periode == 'periode'){
                    $tglawal=$request->get('tglawal');
                    $tglakhir=$request->get('tglakhir');
                    $data=\App\Datapenjualan::All();
                    $bb=DB::table('datapenjualan')
                            ->whereBetween('tgl_jual', [$tglawal,$tglakhir])
                            ->orderby('tgl_jual','ASC')
                            ->get();
                    $pdf = PDF::loadview('lappenj.lappenj_pdf',['lappenj'=>$bb,'datapenjualan' => $data])->setPaper('A4','landscape');
                    return $pdf->stream();
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
