@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


        <h1 class="h3 mb-0 text-gray-800">Simpan Penjualan </h1>
    </div>
    <hr>
    <form action="/datapenjualan/simpan" method="POST">
        @csrf

        <div class="form-group col-sm-4">

            @foreach ($akunkas as $ks)
                <input type="hidden" name="akun" value="{{ $ks->no_akun }}" class="form-control"
                    id="exampleFormControlInput1">
            @endforeach
            @foreach ($datapenjualan as $jual)
                <input type="hidden" name="datapenjualan" value="{{ $jual->no_jual }}" class="form-control"
                    id="exampleFormControlInput1">
            @endforeach
            <input type="hidden" name="no_jurnal" value="{{ $formatj }}" class="form-control"
                id="exampleFormControlInput1">

        </div>
        @foreach ($penjualan as $pnj)
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">No Penjualan</label>
                <input type="text" name="no_jual" value="{{ $pnj->no_jual }}" class="form-control"
                    id="exampleFormControlInput1" readonly>
            </div>


            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Tanggal Penjualan</label>
                <input type="text" min="1" name="tgl_jual" value="{{ $pnj->tgl_jual }}" id="addnmbrg"
                    class="form-control" id="exampleFormControlInput1" require readonly>
            </div>
        @endforeach


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach ($detail as $temp)
                                <tr>
                                    <input name="no_jual[]" class="form-control" type="hidden" value="{{ $temp->no_jual }}"
                                        readonly>
                                    <td><input name="kd_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->kd_brg }}" readonly>{{ $temp->kd_brg }}</td>
                                    <td><input name="nm_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->nm_brg }}" readonly>{{ $temp->nm_brg }}</td>
                                    <td><input name="qty_jual[]" class="form-control" type="hidden"
                                            value="{{ $temp->qty_jual }}" readonly>{{ $temp->qty_jual }}</td>
                                    <td><input name="sub_jual[]" class="form-control" type="hidden"
                                            value="{{ $temp->subtotal }}" readonly>{{ $temp->subtotal }}</td>
                                    <td align="center">
                                        <a href="/transaksi/hapus/{{ $temp->kd_brg }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                    </td>
                                </tr>
                                @php($total += $temp->subtotal)
                            @endforeach
                            <tr>
                                <td colspan="3"></td>
                                <td><input name="total" class="form-control" type="hidden"
                                        value="{{ $total }}">Total {{ number_format($total) }}</a>
                                <td></td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary btn-send" value="Simpan Penjualan">
            </div>
        </div>
    </form>
@endsection
