@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penjualan </h1>
    </div>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-success text-white">
                        <tr>
                            <th width="15%">No</th>
                            <th width="15%">No Penjualan</th>
                            <th>Bayar</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jual as $item)
                            <tr>
                                <td width="15%">{{ $loop->iteration }}</td>
                                <td width="15%">{{ $item->no_jual }}</td>
                                <td>{{ $item->bayar }}</td>
                                <td width="30%">
                                    <a href="{{ route('cetak.order_pdf', $item->id) }}"
                                        target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-print fa-sm text-white-50"></i> Cetak slip pembayaran</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
@endsection
