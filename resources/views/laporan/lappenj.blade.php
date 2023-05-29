<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
table tr td,
table tr th{
font-size: 10pt;
}
</style>
</head>
<body>
<table class="table table-bordered" width="100%" align="center">
<tr align="center">
<td><h2>Laporan Penjualan<br>APOTEK RAJA</h2>
<hr>
</td>
</tr>
</table>
<table class="table table-bordered" width="100%" align="center">
<thead>
<tr>
<th width="5%">Nomor Penjualan</th>
<th width="15%">Tanggal Penjualan</th>
<th width="5%">Total </th>

</tr>
</thead>
<tbody>
@php
$subtotal = 0;

@endphp
<!-- @foreach ($lappenj as $data) -->
<!-- <tr>
<td colspan="5">{{$data->tgl_jual}}</td>
</tr> -->
@foreach ($datapenjualan as $value)
<!-- pembuatan prulangan bersarang -->
@if($loop->parent->first)
<tr>
<td>{{$value->no_jual}}</td>
<td>{{$value->tgl_jual}} </td>
<td>{{number_format($value->total_jual)}}</td>

</tr>
<!-- hitung total penjualan -->
{{$subtotal += $value->total_jual}};

@endif
<!-- @endforeach -->
@endforeach
<tr>
<td></td>
<td>Total Penjualan</td>
<td>Rp. {{ number_format($subtotal) }}</td>

</tr>
</tbody>
</table>
<div align="right">
<h6>Tanda Tangan</h6><br><br><h6>{{ Auth::user()->name }}</h6>
</div>
</body>
</html>