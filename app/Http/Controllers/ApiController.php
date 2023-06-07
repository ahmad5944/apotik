<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;

class ApiController extends Controller
{

    public function barang(Request $request)
    {
    	$data = [];

        if($request->filled('q')){
            $data = Barang::select("kd_brg","nm_brg")
                ->where('nm_brg', 'LIKE', '%'. $request->get('q'). '%')
                ->get();
        }

        return response()->json($data);
    }
}
