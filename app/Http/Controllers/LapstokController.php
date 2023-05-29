<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanstok;
use PDF;
use DB;


class LapstokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laporanstok::All();
        return view ('laporan.stok',['data'=>$data]);
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
        $periode=$request->get('periode');
                if($periode == 'All')
                    {
                    $bb = \App\Laporanstok::All();
                    $akun=\App\Akun::All();
                    $pdf = PDF::loadview('laporan.stok',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
                    return $pdf->stream();
                }elseif($periode == 'periode'){
                    $nm_brg=$request->get('nm_brg');
                    $tglakhir=$request->get('tglakhir');
                    $akun=\App\Akun::All();
                    $bb=DB::table('barang')
                            
                            ->orderby('nm_brg','ASC')
                            ->get();
                    $pdf = PDF::loadview('laporan.stok',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
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
