@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan </h1>
    </div>
    <hr>
    <form action="/detail/simpan" method="POST">
        @csrf
        <div class="form-group col-sm-4">
            <label for="exampleFormControlInput1">No Transaksi</label>

            <input type="text" name="no_jual" value="{{ $formatnya }}" class="form-control" id="exampleFormControlInput1"
                readonly>
        </div>

        <div class="form-group col-sm-4">
            <label for="exampleFormControlInput1">Tanggal Transaksi</label>
            <input type="date" min="1" name="tgl" id="addnmbrg" class="form-control"
                id="exampleFormControlInput1" require>
        </div>
        <div class="form-group col-sm-4">
            <label for="exampleFormControlInput1">Resep</label>
            <select name="rs" id="rs select2" class="form-control" required width="100%">
                <option value="">Pilih Resep</option>
                @foreach ($resep as $rs)
                    <option value="{{ $rs->kd_rs }}"> {{ $rs->nama }} - {{ $rs->umur }} </option>
                @endforeach
            </select>
        </div>
        <div class="card-header py-3" align="right">
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm bg-gradient-success"
                data-toggle="modal" data-target="#exampleModalScrollable">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Obat
            </button>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach ($temp_penjualan as $temp)
                                <tr>
                                    <td><input name="kd_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->kd_brg }}" readonly>{{ $temp->kd_brg }}</td>
                                    <td><input name="nm_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->nm_brg }}" readonly>{{ $temp->nm_brg }} </td>
                                    <td><input name="harga[]" class="form-control" type="hidden"
                                            value="{{ $temp->harga }}" readonly>{{ $temp->sub_total / $temp->qty_jual  }}</td>
                                    <td><input name="qty_jual[]" class="form-control" type="hidden"
                                            value="{{ $temp->qty_jual }}" readonly>{{ $temp->qty_jual }}</td>
                                    <td><input name="sub_total[]" class="form-control" type="hidden"
                                            value="{{ $temp->sub_total }}" readonly>{{ $temp->sub_total }}</td>
                                    <td align="center">
                                        <a href="/transaksi/hapus/{{ $temp->kd_brg }}"
                                            onclick="return confirm('Yakin Ingin menghapus?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                    </td>
                                </tr>
                                @php($total += $temp->sub_total)
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td><input name="total" class="form-control" type="hidden"
                                        value="{{ $total }}">Total {{ number_format($total) }}</a>
                                <td></td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary btn-send bg-gradient-success" value="Simpan Penjualan"
                    align="right">

            </div>
        </div>
    </form>





    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sem/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Obat</label>
                            <select name="brg" id="kd_brg select2" class="form-control" required width="100%">
                                <option value="">Pilih</option>
                                @foreach ($barang as $product)
                                    <option value="{{ $product->kd_brg }}">{{ $product->kd_brg }} -
                                        {{ $product->nm_brg }} - {{ $product->jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">QTY</label>
                            <input type="number" min="1" name="qty" id="addnmbrg" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send bg-gradient-success" value="Tambah Barang">
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
