@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('barang.update', [$barang->kd_brg])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Ubah Data Obat</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addkdbrg">Kode Obat</label>
                <input class="formcontrol" type="text" name="addkdbrg" value="{{$barang->kd_brg}}" readonly>
            </div>
            <div class="col-md-5">
                <label for="addnmbrg">Nama Obat</label>
                <input id="addnmbrg" type="text" name="addnmbrg" class="formcontrol" value="{{$barang->nm_brg}}">
            </div>
            <div class="col-md-5">
                <label for="addnmbrg">Jenis Obat</label>
                <input id="addjenis" type="text" name="addjenis" class="formcontrol" value="{{$barang->jenis}}">
            </div>
            <div class="col-md-5">
                <label for="Harga">Harga</label>
                <input id="addharga" type="text" name="addharga" class="formcontrol" value="{{$barang->harga}}">
            </div>
            <div class="col-md-5">
                <label for="Stok">Stok</label>
                <input id="addstok" type="text" name="addstok" class="formcontrol" value="{{$barang->stok}}">
            </div>
            <div class="col-md-5">
                <label for="addtglrs">Tanggal Kadaluarsa</label>
                <input class="form-control" type="date" name="addtgl" value="{{$barang->tgl}}" >
            </div>
        </fieldset>
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <a href="{{ route('barang.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
        </div>
        <hr>
</form>
@endsection

