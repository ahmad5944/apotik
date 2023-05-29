@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="cardheader">Laporan Stok Obat</div>
                   <div class="table-responsive">
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="card-body">

                        <table class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Stok Awal</th>
                                    <th>Jual</th>
                                    
                                    <th>Stok Total (Stok-Jual)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data as $item):
                                ?>
                                    <tr>
                                        <td>{{ $item->kd_brg}}</td>
                                        <td>{{ $item->nm_brg}}</td>
                                        <td>{{ number_format($item->stok,0,',','.') }}</td>
                                        <td>{{ number_format($item->jual,0,',','.') }}</td>
                                        
                                        <td>{{ number_format($item->stok-$item->beli) }}</td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

