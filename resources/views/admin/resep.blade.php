@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Resep</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm bg-gradient-success"
            data-toggle="modal" data-target="#exampleModalScrollable">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </button>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-success text-white">
                        <tr>
                            <th>Kode Resep</th>
                            <th>Tanggal Resep</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resep as $rs)
                            <tr>
                                <td>{{ $rs->kd_rs }}</td>
                                <td>{{ $rs->tgl_rs }}</td>
                                <td>{{ $rs->nama }}</td>
                                <td>{{ $rs->umur }}</td>
                                <td>{{ $rs->telepon }}</td>
                                <td align="center"><a
                                        href="{{ route('resep.edit', [$rs->id]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                    <a href="/resep/hapus/{{ $rs->id }}"
                                        onclick="return confirm('Yakin ingin menghapus data resep?')"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalScrollable" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Resep</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('resep.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kode Resep</label>
                            <input type="text" name="addkdrs" id="addkdrs" class="form-control" maxlegth="5"
                                id="exampleFormControlInput1">
                        </div>

                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Tanggal Resep</label>
                            <input type="date" name="addtglrs" id="addtglrs" class="form-control"
                                id="exampleFormControlInput1">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama </label>
                            <input type="text" name="addnama" id="addnama" class="form-control"
                                id="exampleFormControlInput1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Umur </label>
                            <input type="text" name="addumur" id="addumur" class="form-control"
                                id="exampleFormControlInput1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Telepon</label>
                            <input type="text" name="addtelepon" id="addtelepon" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="dynamicTable">
                            <thead>
                                <tr>
                                    <th>Kode Obat</th>
                                    <th>Qty</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="addmore[0][kd_brg]" style="width: 350px;">
                                            @foreach ($obat as $item)
                                                <option value="{{ $item->kd_brg }}">
                                                    {{ $item->nm_brg }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="form-control" type="text" name="addmore[0][qty]"></td>
                                    <td><button type="button" name="add" id="add"
                                            class="btn btn-success btn-add">+</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                    </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append('<tr><td><select class="form-control" name="addmore[' +
                i +
                '][kd_brg]" style="width: 350px;"><?php foreach ($obat as $item): ?><option value="{{ $item->kd_brg }}">{{ $item->nm_brg }}</option><?php endforeach; ?></select></td><td><input class="form-control" type="text" name="addmore[' +
                i +
                '][qty]"></td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>'
            );

        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

        var path = "{{ route('apiBarang') }}";

        $('#select2').select2({
            dropdownParent: "#exampleModalScrollable",
            placeholder: 'Pilih Barang',
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nm_brg,
                                id: item.kd_brg
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
