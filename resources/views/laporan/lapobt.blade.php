<!DOCTYPE html>
<html>

<head>
    <title>Laporan Obat Keluar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h2>Laporan Obat Keluar<br>APOTEK RAJA</h2>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="5%">Tgl jual</th>
                <th width="15%">kd brg</th>
                <th width="5%">nama brg </th>
                <th width="5%">qty jual </th>

            </tr>
        </thead>
        <tbody>
            @php
                $subtotal = 0;
                
            @endphp
            <!-- @foreach ($lapobt as $data)
-->
            <!-- <tr>
<td colspan="5">{{ $data->tgl_jual }}</td>
</tr> -->
            @foreach ($lapobt as $value)
                <!-- pembuatan prulangan bersarang -->
                @if ($loop->parent->first)
                    <tr>
                        <td>{{ $value->tgl_jual }}</td>
                        <td>{{ $value->kd_brg }} </td>
                        <td>{{ $value->nm_brg }}</td>
                        <td>{{ $value->qty_jual }}</td>

                    </tr>
                    <!-- hitung total penjualan -->
                @endif
                <!--
@endforeach -->
            @endforeach
            <tr>
                <td></td>


            </tr>
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ Auth::user()->name }}</h6>
    </div>
</body>

</html>
