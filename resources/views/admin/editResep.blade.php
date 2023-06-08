@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('resep.update', [$resep->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Ubah Data Resep</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addkdrs">Kode Resep</label>
                <input class="form-control" type="text" name="addkdrs" value="{{$resep->kd_rs}}" readonly>
            </div>

            <div class="col-md-5">
                <label for="addtglrs">Tanggal Resep</label>
                <input class="form-control" type="date" name="addtglrs" value="{{$resep->tgl_rs}}" >
            </div>

            <div class="col-md-5">
                <label for="addnama">Nama </label>
                <input id="addnama" type="text" name="addnama" class="form-control" value="{{$resep->nama}}">
            </div>
            <div class="col-md-5">
                <label for="addumur">Umur </label>
                <input id="addumur" type="text" name="addumur" class="form-control" value="{{$resep->umur}}">
            </div>
            
            <div class="col-md-5">
                <label for="Telepon">Telepon</label>
                <input id="addtelepon" type="text" name="addtelepon" class="form-control" value="{{$resep->telepon}}">
            </div>

            <div class="col-md-5">
                <label for="Barang">Barang</label>
                <select class="form-control" name="kd_brg" style="width: 250px;">
                    @foreach ($obat as $item)
                        <option value="{{ $item->kd_brg }}" {{ $item->kd_brg == $resep->kd_brg ? 'selected' : '' }} >{{ $item->nm_brg }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5">
                <label for="Qty">Qty</label>
                <input id="qty" type="text" name="qty" class="form-control" value="{{$resep->qty}}">
            </div>

    </fieldset>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Update">
        <a href="{{ route('resep.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
    </div>
    <hr>
</form>
@endsection