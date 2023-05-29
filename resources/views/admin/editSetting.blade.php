@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('setting.update', [$setting->id_setting])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Ubah Data Setting</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addid">ID Setting</label>
                <input class="form-control" type="text" name="addid" value="{{$setting->id_setting}}" readonly>
            </div>
            <div class="col-md-5">
            <label for="addnoakun">No Akun</label>
            <select name="addnoakun" id="addnoakun"  class="form-control" required width="100%">
            <option value="">Pilih Akun</option>
          @foreach ($akun as $akn)
              <option value="{{ $akn->no_akun }}">{{ $akn->no_akun }} - {{ $akn->nm_akun }} </option>
          @endforeach
          </select>
            </div>
            <div class="col-md-5">
                <label for="addnama">Nama Transaksi</label>
                <input id="addnama" type="select" name="addnama" class="form-control" value="{{$setting->nama_transaksi}}">
            </div>
    </fieldset>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Update">
        <a href="{{ route('setting.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
    </div>
    <hr>
</form>
@endsection
