<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Resep;
use App\Penjualan;
use App\Temp_penjualan;
use App\Temp_Jual;
use Alert;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Akun::All();
        $barang=\App\Barang::All();
        $resep=\App\Resep::All();
        $temp_jual=\App\Temp_Jual::All();
        //No otomatis untuk transaksi penjualan
        $AWAL = 'TRX';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = \App\Penjualan::max('no_jual');
        $no = 1;
        $formatnya = sprintf("%03s", abs((int)$noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        return view('penjualan.penjualan' , 
                    ['barang' => $barang,
                    'akun' => $akun, 
                    'resep'=>$resep,
                    'temp_penjualan'=>$temp_jual,
                    'formatnya'=> $formatnya ]);
    }

    public function tambahOrder()
    {
    return view('penjualan'); 

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
        //Validasi jika barang sudah ada paada tabel temporari maka QTY akaan di edit
        if (Temp_penjualan::where('kd_brg', $request->brg)->exists()) {
            Alert::warning('Pesan ','barang terjual.. QTY akan terupdate?');
            Temp_penjualan::where('kd_brg', $request->brg)
                            ->update(['qty_jual' => $request->qty]);
            return redirect('transaksi');
        }else{
            Temp_penjualan::create([
                'qty_jual' => $request->qty,
                'kd_brg' => $request->brg
            ]);
        return redirect('transaksi');
}

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
    public function destroy($kd_brg)
    {
        $barang=\App\Temp_penjualan::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect('transaksi');

    }
}
