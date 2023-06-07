<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $date   = Barang::select('tgl')->get();
        $arr = [];
        foreach ($date as $key => $value) {
            // dd($value->pluck('tgl'));
            // $c = new Carbon($value->tgl);
            // $a = $c->subMonth()->format('Y-m-d');
            // $test = $value;
            // // dd($a);
            // $arr[] = $a;
            // dd($arr);

            // $tests = $test->subMonth()->month;
            // dd($tests);
            // new Carbon('24-06-01');
            // dd($test);
            // $parsingJson    = json_encode($test, true);
        }
        // dd($parsingJson);

        $datas  = Barang::all();
        // dd($test->subMonth());
        Carbon::now()->subMonths();
        return view('home', compact('datas'));
    }
}
