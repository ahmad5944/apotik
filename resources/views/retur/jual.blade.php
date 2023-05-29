@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


        <h1 class="h3 mb-0 text-gray-800">Detail Pengembalian </h1>
    </div>
    <hr>
    <form action="/retur/simpan" method="POST">
        @csrf
        @foreach($penjualan as $pnj)
        <div class="form-group col-sm-4">
            <label for="exampleFormControlInput1">No penjualan</label>           
            <input type="text" name="no_jual" value="{{ $pnj->no_jual }}" class="form-control" id="exampleFormControlInput1" readonly >
        </div>
        @endforeach
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">No Retur</label> 
                @foreach($kas as $ks)
                <input type="hidden" name="kas" value="{{ $ks->no_akun }}" class="form-control" id="exampleFormControlInput1" >           
                @endforeach
                @foreach($retur as $rtr)
                <input type="hidden" name="retur" value="{{ $rtr->no_akun }}" class="form-control" id="exampleFormControlInput1" >           
                @endforeach            
                <input type="hidden" name="no_jurnal" value="{{ $formatj }}" class="form-control" id="exampleFormControlInput1" >
                <input type="text" name="no_retur" value="{{ $format }}" class="form-control" id="exampleFormControlInput1" readonly >
            </div>                 
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Tanggal Retur</label>
                <input type="date" min="1" name="tgl" id="addnmbrg" class="form-control" id="exampleFormControlInput1" require >         
            </div>     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-gradient-success text-white">
            <tr>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th align="center">Jumlah Obat Dijual</th>
            <th width=10%>Jumlah Retur</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php($total = 0)
        @foreach($jual as $jlu)
        <tr>
            <td><input name="kd_brg[]" class="form-control" type="hidden" value="{{$jlu->kd_brg}}" readonly>{{$jlu->kd_brg}}</td>
            <td><input name="nm_brg[]" class="form-control" type="hidden" value="{{$jlu->nm_brg}}" readonly>{{$jlu->nm_brg}}</td>
            <td align="center"><input name="qty_jual[]" class="form-control" type="hidden" value="{{$jlu->qty_jual}}" readonly>{{$jlu->qty_jual}}</td>
            <input name="harga[]" class="form-control" type="hidden" value="{{$jlu->harga}}" readonly>{{$jlu->harga}}</td>
            <td width=10%><input name="jml_retur[]" class="form-control" type="number" value="0"></td>
            <td align="center">
            <a href="/transaksi/hapus/{{$jlu->kd_brg}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                        </td>
        </tr>
            @endforeach
                </tbody>
        </table>
    </div>
    <input type="submit" class="btn btn-primary btn-send" value="Simpan Retur">
    </div>
    </div>
    </form>
    @endsection