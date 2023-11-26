@extends('layout.app')

@section('title', 'Inventaris Bahan')

@section('content')
<main>
    <div class="container-fluid">
    <h5 class="mt-4 mb-5">Inventaris</h5>
    @if(session()->has('success'))
        <div class="alert alert-success">
          {{session()->get('success')}}
        </div>
    @endif
    @if(session()->has('errors'))
        <div class="alert alert-danger">
          Terdapat Kesalahan saat Mengisi Form, Silahkan Coba Lagi
        </div>
    @endif
    <!-- tabel alat -->
    <div class="card mb-4">
        <div class="row">
        <div class="col"><h5 class="mt-4 ml-3">Bahan</h5></div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-primary mt-4 mr-4" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i>Tambah Bahan Baru</button>
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
                @foreach ($bahan as $bhn)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><?= $bhn['nama_bahan'] ?></td>
                    <td><?= $bhn['jumlah'] ?></td>
                    <td><?= $bhn['satuan'] ?></td>
                    <td><?= $bhn['kondisi'] ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning ml-2" style="width: 60px" data-toggle="modal" data-target="#edit{{$bhn['id']}}">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger ml-2 mt-1" style="width: 60px" data-toggle="modal" data-target="#delete{{$bhn['id']}}" >Hapus</button>
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
<!-- modals -->
@foreach ($bahan as $bhn)
<div class="modal fade" id="delete{{$bhn['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus bahan ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">Jika Anda menekan "yakin" maka bahan akan dihapus dari tabel.</div>
        <div class="modal-footer">
            <a href="/bahan" class="btn btn-secondary">Batal</a>
            <a href="/deleteBhn/<?= $bhn['id'] ?>" class="btn btn-primary">Yakin</a>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="edit{{$bhn['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info bahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/editBahan/<?= $bhn['id'] ?>" method="post">
            @csrf
            <div class="modal-body">
                        <label for="id">ID Bahan</label>
                        <input type="text" name="id" id="" class="col" value="<?=  $bhn['id'] ?>" readonly><br><br>
                        <label for="id">Nama Bahan</label>
                        <input type="text" name="nama_bahan" id="" class="col" value="<?=  $bhn['nama_bahan'] ?>"><br><br>
                        @if($errors->first('nama_bahan'))
                            <div class="alert alert-danger">
                                    {{$errors->first('nama_bahan')}}
                            </div> 
                        @endif
                        <label for="id">Jumlah</label>
                        <input type="text" name="jumlah" id="" class="col" value="<?=  $bhn['jumlah'] ?>"><br><br>
                        @if($errors->first('jumlah'))
                            <div class="alert alert-danger">
                                    {{$errors->first('jumlah')}}
                            </div> 
                        @endif
                        <label for="id">Satuan</label>
                        <input type="text" name="satuan" id="" class="col" value="<?=  $bhn['satuan'] ?>"><br><br>
                        @if($errors->first('satuan'))
                            <div class="alert alert-danger">
                                    {{$errors->first('satuan')}}
                            </div> 
                        @endif
                        <label for="id">Kondisi</label>
                        <input type="text" name="kondisi" id="" class="col" value="<?=  $bhn['kondisi'] ?>"><br><br>
                        @if($errors->first('kondisi'))
                            <div class="alert alert-danger">
                                    {{$errors->first('kondisi')}}
                            </div> 
                        @endif
            </div>
            <div class="modal-footer">
                <a href="/bahan" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info bahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/addBahan" method="POST">
            <div class="modal-body">
                @csrf
                <label for="nama_alat">Nama Bahan</label>
                <input type="text" name="nama_bahan" id="nama_alat" class="col"><br><br>
                @if($errors->first('nama_bahan'))
                    <div class="alert alert-danger">
                            {{$errors->first('nama_bahan')}}
                    </div> 
                @endif
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="col"><br><br>
                @if($errors->first('jumlah'))
                    <div class="alert alert-danger">
                            {{$errors->first('jumlah')}}
                    </div> 
                @endif
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" id="satuan" class="col"><br><br>
                @if($errors->first('satuan'))
                    <div class="alert alert-danger">
                            {{$errors->first('satuan')}}
                    </div> 
                @endif
                <label for="kondisi">Kondisi</label>
                <input type="text" name="kondisi" id="kondisi" class="col"><br><br>
                @if($errors->first('kondisi'))
                    <div class="alert alert-danger">
                            {{$errors->first('kondisi')}}
                    </div> 
                @endif
            </div>
            <div class="modal-footer">
                <a href="/bahan" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Tambah Bahan" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>
<!-- akhir modals -->

@endsection