@extends('layout.app')

@section('title', 'Menu')

@section('content')

<main>
    <div class="container-fluid">
    <h5 class="mt-4 mb-5">Menu</h5>
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
        <div class="col"><h5 class="mt-4 ml-3">Daftar Menu</h5></div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-primary mt-4 mr-4"  data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Menu Baru</button>
        </div>
        </div>

        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>NO</th>
                <th>NAMA MENU</th>
                <th>HARGA</th>
                <th>UNTUNG</th>
                <th>OPSI</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($menu as $mn)
                <tr>
                    <td> {{$loop->iteration}}</td>
                    <td><?= $mn['nama_menu'] ?></td>
                    <td>Rp. <?= $mn['harga'] ?></td>
                    <td>Rp. <?= $mn['untung'] ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning ml-2" style="width: 60px" data-toggle="modal" data-target="#edit{{$mn['id']}}">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger ml-2 mt-1" style="width: 60px" data-toggle="modal" data-target="#delete{{$mn['id']}}" >Hapus</button>
                    </td>
                <tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</main>
<!-- modals -->
@foreach ($menu as $mn)
<div class="modal fade" id="delete{{$mn['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus menu ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">Jika Anda menekan "yakin" maka menu akan dihapus dari tabel.</div>
        <div class="modal-footer">
            <a href="/menu" class="btn btn-secondary">Batal</a>
            <a href="/deleteMn/<?= $mn['id'] ?>" class="btn btn-primary">Yakin</a>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="edit{{$mn['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/editMenu/<?= $mn['id'] ?>" method="post">
            @csrf
            <div class="modal-body">
                        <label for="id">ID Menu</label>
                        <input type="text" name="id" id="" class="col" value="<?=  $mn['id'] ?>" readonly><br><br>
                        <label for="id">Nama Menu</label>
                        <input type="text" name="nama_menu" id="" class="col" value="<?=  $mn['nama_menu'] ?>"><br><br>
                        @if($errors->first('nama_menu'))
                            <div class="alert alert-danger">
                                    {{$errors->first('nama_menu')}}
                            </div> 
                        @endif
                        <label for="id">Harga</label>
                        <input type="text" name="harga" id="" class="col" value="<?=  $mn['harga'] ?>"><br><br>
                        @if($errors->first('harga'))
                            <div class="alert alert-danger">
                                    {{$errors->first('harga')}}
                            </div> 
                        @endif
                        <label for="untung">Untung</label>
                        <input type="text" name="untung" id="" class="col" value="<?=  $mn['untung'] ?>"><br><br>
                        @if($errors->first('harga'))
                            <div class="alert alert-danger">
                                    {{$errors->first('untung')}}
                            </div> 
                        @endif
            </div>
            <div class="modal-footer">
                <a href="/menu" class="btn btn-secondary">Batal</a>
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
        <h5 class="modal-title" id="staticBackdropLabel">Detail info menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/addMenu" method="POST">
            <div class="modal-body">
                @csrf
                <label for="nama_alat">Nama Menu</label>
                <input type="text" name="nama_menu" id="" class="col"><br><br>
                @if($errors->first('nama_menu'))
                    <div class="alert alert-danger">
                            {{$errors->first('nama_menu')}}
                    </div> 
                @endif
                <label for="jumlah">Harga</label>
                <input type="text" name="harga" id="" class="col"><br><br>
                @if($errors->first('harga'))
                    <div class="alert alert-danger">
                            {{$errors->first('harga')}}
                    </div> 
                @endif
                <label for="untung">Untung</label>
                <input type="text" name="untung" id="" class="col"><br><br>
                @if($errors->first('untung'))
                    <div class="alert alert-danger">
                            {{$errors->first('untung')}}
                    </div> 
                @endif
            </div>
            <div class="modal-footer">
                <a href="/menu" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Tambah Menu" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>
<!-- akhir modals -->
@endsection