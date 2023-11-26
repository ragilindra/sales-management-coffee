@extends('layout.app')

@section('title', 'Inventaris Alat')

@section('content')
    <main>
        <div class="container-fluid">
            <h5 class="mt-4 mb-5">Inventaris</h5>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <br>
            @if (session()->has('errors'))
                <div class="alert alert-danger">
                    Terdapat Kesalahan saat Mengisi Form, Silahkan Coba Lagi
                </div>
            @endif
            <!-- tabel alat -->
            <div class="card mb-4">
                <div class="row">
                    <div class="col">
                        <h5 class="mt-4 ml-3">Alat</h5>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-primary mt-4 mr-4" data-toggle="modal"
                            data-target="#tambah"><i class="fas fa-plus"></i> Tambah Alat Baru</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA BAHAN</th>
                                    <th>JUMLAH</th>
                                    <th>SATUAN</th>
                                    <th>KONDISI</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alat as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><?= $row['nama_alat'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                        <td><?= $row['kondisi'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning ml-2" style="width: 60px"
                                                data-toggle="modal" data-target="#edit{{ $row['id'] }}">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger ml-2 mt-1"
                                                style="width: 60px" data-toggle="modal"
                                                data-target="#delete{{ $row['id'] }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- modals delete -->
    @foreach ($alat as $row)
        <div class="modal fade" id="delete{{ $row['id'] }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus alat?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Jika Anda menekan "yakin" maka alat akan dihapus dari tabel.</div>
                    <div class="modal-footer">
                        <a href="/alat" class="btn btn-secondary">Batal</a>
                        <a href="/deleteAlt/<?= $row['id'] ?>" class="btn btn-primary">Yakin</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit{{ $row['id'] }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detail info alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/editAlat/<?= $row['id'] ?>" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="id">ID Alat</label>
                            <input type="text" name="id" id="" class="col" value="<?= $row['id'] ?>"
                                readonly><br><br>
                            <label for="id">Nama Alat</label>
                            <input type="text" name="nama_alat" id="" class="col"
                                value="<?= $row['nama_alat'] ?>"><br><br>
                            @if ($errors->first('nama_alat'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('nama_alat') }}
                                </div>
                            @endif
                            <label for="id">Jumlah</label>
                            <input type="text" name="jumlah" id="" class="col"
                                value="<?= $row['jumlah'] ?>"><br><br>
                            @if ($errors->first('jumlah'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('jumlah') }}
                                </div>
                            @endif
                            <label for="id">Satuan</label>
                            <input type="text" name="satuan" id="" class="col"
                                value="<?= $row['satuan'] ?>"><br><br>
                            @if ($errors->first('satuan'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('satuan') }}
                                </div>
                            @endif
                            <label for="id">Kondisi</label>
                            <input type="text" name="kondisi" id="" class="col"
                                value="<?= $row['kondisi'] ?>"><br><br>
                            @if ($errors->first('kondisi'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('kondisi') }}
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="/alat" class="btn btn-secondary">Batal</a>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail info alat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/addAlat" method="POST">
                    <div class="modal-body">
                        @csrf
                        <label for="nama_alat">Nama Alat</label>
                        <input type="text" name="nama_alat" id="nama_alat" class="col"><br><br>
                        @if ($errors->first('nama_alat'))
                            <div class="alert alert-danger">
                                {{ $errors->first('nama_alat') }}
                            </div>
                        @endif
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="col"><br><br>
                        @if ($errors->first('jumlah'))
                            <div class="alert alert-danger">
                                {{ $errors->first('jumlah') }}
                            </div>
                        @endif
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="col"><br><br>
                        @if ($errors->first('satuan'))
                            <div class="alert alert-danger">
                                {{ $errors->first('satuan') }}
                            </div>
                        @endif
                        <label for="kondisi">Kondisi</label>
                        <input type="text" name="kondisi" id="kondisi" class="col"><br><br>
                        @if ($errors->first('kondisi'))
                            <div class="alert alert-danger">
                                {{ $errors->first('kondisi') }}
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a href="/alat" class="btn btn-secondary">Batal</a>
                        <input type="submit" value="Tambah Alat" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir modals -->
@endsection
