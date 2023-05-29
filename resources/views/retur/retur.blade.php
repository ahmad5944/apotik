@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Pengembalian </h1>
</div>
<hr>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div class="card-body">


<div class="table-responsive">
<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-gradient-success text-white">
        <tr>
        <th width="15%">No Penjualan</th>
        <th>Tanggal Jual</th>
        <th>Total Jual</th>
        <th width="30%">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datapenjualan as $jual)
    <tr>
        <td width="15%">{{ $jual->no_jual }}</td>
        <td>{{ $jual->tgl_jual }}</td>
        <td>Rp. {{ number_format($jual->total_jual) }}</td>
        <td width="30%">
        <a href="{{url('/retur-jual/'.Crypt::encryptString($jual->no_jual))}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-recycle fa-sm text-white-50"></i> Retur</a>
                <a href="/akun/hapus/{{$jual->no_jual}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
        <i class="fas fa-trash-alt fa-sm text-white-50"></i> HAPUS</a></td>
    </tr>
    @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</form>
@endsection

