<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Detaildatapenjualan;
use App\Datapenjualan;
use App\Penjualan;
use App\Jurnal;
use App\Lapobt;
use DB;
use Alert;
use PDF;

 
class DataPenjualanController extends Controller
{

    public function index()
    {
        $jual = Penjualan::with('noJual')->get();
        
        return view('data penjualan.datapenjualan',['penjualan'=>$jual]);
    }
 
    public function edit($id)
    {
        $AWALJurnal = 'JRU';
        $bulanRomawij = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhirj = \App\Jurnal::max('no_jurnal');
        $noj = 1;
        $formatj=sprintf("%03s", abs((int)$noUrutAkhirj + 1)). '/' . $AWALJurnal .'/' . $bulanRomawij[date('n')] .'/' . date('Y');
    
        $decrypted = Crypt::decryptString($id);

        $datapenjualan      = DB::table('datapenjualan')->where('no_jual',$decrypted)->get();
        $detail             = DB::table('tampil_penjualan')->where('no_jual',$decrypted)->get();
        $detailpenjualan    = Detaildatapenjualan::where('no_jual',$decrypted)->first();
        $penjualan          = DB::table('penjualan')->where('no_jual',$decrypted)->get();
        $akunkas            = DB::table('setting')->where('nama_transaksi','Kas')->get();
        $akunpenjualan      = DB::table('setting')->where('nama_transaksi','datapenjualan')->get();
        return view('data penjualan.jual', compact(
            'detail',
            'decrypted',
            'penjualan',
            'formatj',
            'akunkas',
            'akunpenjualan',
            'datapenjualan',
            'detailpenjualan'
        ));
    }

    public function simpan(Request $request)
    {
        $req = $request->all();
        if (DataPenjualan::where('no_jual', $request->no_jual)->exists()) {
            $kdbrg  = $request->kd_brg;
            $qtyjual = $request->qty_jual;
            $subjual = $request->sub_jual;

            foreach($kdbrg as $key => $no)
            {
                $input['no_jual']   = $req['datapenjualan'];
                $input['kd_brg']    = $kdbrg[$key];
                $input['qty_jual']  = $qtyjual[$key];
                $input['sub_jual']  = $subjual[$key];
                $input['bayar']     = $req['bayar'];
                Detaildatapenjualan::insert($input);
            }

            //SIMPAN ke table lapobt
            $tambah_lapobt = new Lapobt;
            $tambah_lapobt->tgl_jual = $request->tgl_jual;
            foreach ($request->nm_brg as $key => $value) {
                $tambah_lapobt->nm_brg = $value;
            }
            foreach ($request->kd_brg as $key => $value) {
                $tambah_lapobt->kd_brg = $value;
            }
            foreach ($request->qty_jual as $key => $value) {
                $tambah_lapobt->qty_jual = $value;
            }
            $tambah_lapobt->save();
            
            //SIMPAN ke table jurnal bagian kredit
            $tambah_jurnalkredit=new Jurnal;
            $tambah_jurnalkredit->no_jurnal = $request->no_jurnal;
            $tambah_jurnalkredit->keterangan = 'Kas';
            $tambah_jurnalkredit->tgl_jurnal = $request->tgl_jual;
            $tambah_jurnalkredit->no_akun = $request->kas;
            $tambah_jurnalkredit->debet = $request->total ?? 0;
            $tambah_jurnalkredit->kredit = 0;
            $tambah_jurnalkredit->save();

            //SIMPAN ke table jurnal bagian debet
            $tambah_jurnaldebet=new Jurnal;
            $tambah_jurnaldebet->no_jurnal = $request->no_jurnal;
            $tambah_jurnaldebet->keterangan = 'Penjualan';
            $tambah_jurnaldebet->tgl_jurnal = $request->tgl_jual;
            $tambah_jurnaldebet->no_akun = $request->penjualan; 
            $tambah_jurnaldebet->debet = 0;
            $tambah_jurnaldebet->kredit = $request->total ?? 0;
            $tambah_jurnaldebet->save();
            Alert::success('Pesan ','penjualan Telah dilakukan ');

            return redirect('datapenjualan');
        }else{
            //Simpan ke table data penjualan
            $tambah_datapenjualan=new \App\Datapenjualan;
            $tambah_datapenjualan->no_jual = $request->no_jual[0];
            $tambah_datapenjualan->tgl_jual = $request->tgl;
            $tambah_datapenjualan->total_jual = $request->total;
            $tambah_datapenjualan->save();
            //SIMPAN DATA KE TABEL DETAIL data penjualan
            $kdbrg  = $request->kd_brg;
            $qtyjual = $request->qty_jual;
            $subjual = $request->sub_jual;
            foreach($kdbrg as $key => $no)
            {
                $input['no_jual']   = $request->no_jual;
                $input['kd_brg']    = $kdbrg[$key];
                $input['qty_jual']  = $qtyjual[$key];
                $input['sub_jual']  = $subjual[$key];
                Detaildatapenjualan::insert($input);
            }
            
            //SIMPAN ke table lapstok
            $tambah_lapstok=new \App\Laporanstok;
            $tambah_lapstok->kd_brg = $request->kdbrg;
            $tambah_lapstok->nm_brg = $request->nmbrg;
            $tambah_lapstok->harga = $request->harga;
            $tambah_lapstok->stok = $request->stok;
            $tambah_lapstok->jual = $request->jual;
            //$tambah_lapstok->retur = $request->retur;
            $tambah_lapstok->save();

            //SIMPAN ke table lapobt
            $tambah_lapobt=new \App\Lapobt;
            $tambah_lapobt->tgl_jual = $request->tgl_jual;
            $tambah_lapobt->kd_brg = $request->kd_brg;
            $tambah_lapobt->nm_brg = $request->nm_brg;
            $tambah_lapobt->qty_jual = $request->qty_jual;
            $tambah_lapobt->save();

            //SIMPAN ke table jurnal bagian kredit
            $tambah_jurnalkredit=new \App\Jurnal;
            $tambah_jurnalkredit->no_jurnal = $request->no_jurnal;
            $tambah_jurnalkredit->keterangan = 'Kas';
            $tambah_jurnalkredit->tgl_jurnal = $request->tgl;
            $tambah_jurnalkredit->no_akun = $request->kas;
            $tambah_jurnalkredit->debet = $request->total;
            $tambah_jurnalkredit->kredit = '0';
            $tambah_jurnalkredit->save();

            //SIMPAN ke table jurnal bagian debet
            $tambah_jurnaldebet=new \App\Jurnal;
            $tambah_jurnaldebet->no_jurnal = $request->no_jurnal;
            $tambah_jurnaldebet->keterangan = 'Penjualan';
            $tambah_jurnaldebet->tgl_jurnal = $request->tgl;
            $tambah_jurnaldebet->no_akun = $request->penjualan;
            $tambah_jurnaldebet->debet = '0' ;
            $tambah_jurnaldebet->kredit = $request->total;
            $tambah_jurnaldebet->save();
            Alert::success('Pesan ','Data berhasil disimpan');
            return redirect('/datapenjualan');
        }

    }
    public function detailPenjualan($id){
        $decrypted = Crypt::decryptString($id);
        
        $jual = Detaildatapenjualan::where('no_jual', $decrypted)->get();
        return view('data penjualan.detailDatapenjualan', compact('jual'));   
    }
    public function pdf($id){
        $decrypted      = Crypt::decryptString($id);
        $detail         = DB::table('tampil_penjualan')->where('no_jual',$decrypted)->get();
        $resep          = DB::table('resep')->get();
        $penjualan      = DB::table('penjualan')->where('no_jual',$decrypted)->get();
        $bayar          = Detaildatapenjualan::where('no_jual', $decrypted)->first();
        $tanggal        = DB::table('penjualan')->where('no_jual',$decrypted)->first();
        $pdf            = PDF::loadView('laporan.faktur',['tanggal'=>$tanggal,'detail'=>$detail,'order'=>$penjualan,'rs'=>$resep,'noorder'=>$decrypted, 'bayar'=>$bayar]);
        return $pdf->stream();    
    }
}
