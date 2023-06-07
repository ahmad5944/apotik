@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Laporan Jurnal Umum</div>

                    <div class="card-body">
                        <form action="/laporan/cetak" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="klasifikasi">Periode Transaksi Jurnal Umum</label>
                                        <input id="jenis" type="hidden" name="jenis" value="cetak"
                                            class="form-control">
                                        <select id="periode" name="periode"class="form-control">
                                            <option value="">--Pilih Periode Laporan--
                                            </option>
                                            <option value="All">Semua</option>

                                            <option value="periode">Per Periode</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>

                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-10">

                                    <input type="submit" class="btn btn-success btn-send" value="Cetak">

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


                <div class="card">

                    <div class="card-header">Laporan Penjualan</div>

                    <div class="card-body">
                        <form action="/laporan/lappenj" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="klasifikasi">Periode Transaksi Penjualan</label>
                                        <input id="jenis" type="hidden" name="jenis" value="lappenj"
                                            class="form-control">
                                        <select id="periode" name="periode"class="form-control">
                                            <option value="">--Pilih Periode Laporan--
                                            </option>
                                            <option value="All">Semua</option>

                                            <option value="periode">Per Periode</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>

                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-10">

                                    <input type="submit" class="btn btn-success btn-send" value="Cetak">

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">Laporan Kas Masuk</div>

                    <div class="card-body">
                        <form action="/laporan/kasmasuk" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="klasifikasi">Periode Kas Masuk</label>
                                        <input id="jenis" type="hidden" name="jenis" value="kasmasuk"
                                            class="form-control">
                                        <select id="periode" name="periode"class="form-control">
                                            <option value="">--Pilih Periode Laporan--
                                            </option>
                                            <option value="All">Semua</option>

                                            <option value="periode">Per Periode</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>

                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btn-send" value="Cetak">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


                <div class="card">

                    <div class="card-header">Laporan Obat Keluar</div>

                    <div class="card-body">
                        <form action="/laporan/lapobt" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="klasifikasi">Periode Laporan Obat Keluar</label>
                                        <input id="jenis" type="hidden" name="jenis" value="lapobt"
                                            class="form-control">
                                        <select id="periode" name="periode"class="form-control">
                                            <option value="">--Pilih Periode Laporan--
                                            </option>
                                            <option value="All">Semua</option>

                                            <option value="periode">Per Periode</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>

                                    <div class="col-md-3">

                                        <label for="no_hp">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-10">

                                    <input type="submit" class="btn btn-success btn-send" value="Cetak">

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


            </div>
            </fieldset>
            </form>
        </div>
    </div>




    </div>
    </div>
    </div>
    </div>
@endsection
