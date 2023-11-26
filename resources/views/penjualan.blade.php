@extends('layout.app')

@section('title', 'Halaman Penjualan')

@section('content')
<main>
    <div class="container-fluid">
    <h5 class="mt-4 mb-5">Penjualan</h5>
    @if(session()->has('success'))
        <div class="alert alert-success">
          {{session()->get('success')}}
        </div>
    @endif
    <div class="row mt-4 justify-content-between">
        <!-- card menu -->
        <div class="col-xl-4 col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
            <div class="col-md-5 bg-danger rounded text-center">
                <h5 class="card-title text-light mt-2">Total Pendapatan</h5>
            </div>
            <div class="col-md-7">
                <div class="card-body text-center">
                    <h5 class="card-title" id="totalDapat"></h5>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- end card menu -->

        <!-- card penjualan -->
        <div class="col-xl-4 col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
            <div class="col-md-5 bg-success rounded text-center">
                <h5 class="card-title text-light mt-2">Total Keuntungan</h5>
            </div>
            <div class="col-md-7">
                <div class="card-body text-center">
                    <h5 class="card-title" id="totalUntung"></h5>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- end card penjualan -->

        <!-- card barista -->
        <div class="col-xl-4 col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
            <div class="col-md-5 bg-warning rounded text-center">
                <h5 class="card-title text-light mt-2">Total Barang Terjual</h5>
            </div>
            <div class="col-md-7">
                <div class="card-body text-center">
                    <h5 class="card-title" id="totalBarang"></h5>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- end card barista -->
    </div>
    <!-- tabel alat -->
    <div class="card mb-4">
        <div class="row">
        <div class="col"><h5 class="mt-4 ml-3">Data Penjualan</h5></div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-primary mt-4 mr-4" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Penjualan Baru</button>
        </div>
        </div>
        <div class="input-group mt-3">
        <p class="mt-3 my-auto ml-3 rounded p-2 shadow-sm" style="background-color: #a4cada" id="jual"> <span class="p-1 rounded" style="background-color: #cbd2d4"></span></p>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>NAMA BARANG</th>
                <th>JUMLAH</th>
                <th>TOTAL HARGA (Rp)</th>
                <th>TOTAL UNTUNG (Rp)</th>
                <th>OPSI</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($penjualan as $pj)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><?= $pj['created_at'] ?></td>
                    <td><?= $pj['nama_barang'] ?></td>
                    <td id="jumlah"><?= $pj['jumlah'] ?></td>
                    <td id="harga"><?= $pj['Total_Harga'] ?></td>
                    <td id="untung"><?= $pj['untung'] ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning ml-2" style="width: 60px" data-toggle="modal" data-target="#edit{{$pj['id']}}">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger ml-2" style="width: 60px" data-toggle="modal" data-target="#delete{{$pj['id']}}">Hapus</button>
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
@foreach ($menu as $mn)
@foreach ($penjualan as $pj)
<div class="modal fade" id="delete{{$pj['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">Jika Anda menekan "yakin" maka data akan dihapus dari tabel.</div>
        <div class="modal-footer">
            <a href="/penjualan" class="btn btn-secondary">Batal</a>
            <a href="/deletePn/<?= $pj['id'] ?>" class="btn btn-primary">Yakin</a>
        </div>
    </div>
    </div>
</div>


<div class="modal fade" id="edit{{$pj['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/editPenjualan/<?= $pj['id'] ?>" method="post">
            @csrf
            <div class="modal-body">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="" class="col" value="<?=  $mn['id'] ?>" readonly><br><br>    
                        <label for="id">Nama Barang</label>
                        <input type="text" name="nama_barang" id="" class="col" value="<?=  $pj['nama_barang'] ?>" readonly><br><br>
                        <label for="id">Jumlah</label>
                        <input type="text" name="jumlah" id="" class="col" value="<?=  $pj['jumlah'] ?>"><br><br>
            </div>
            <div class="modal-footer">
                <a href="/penjualan" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>
@endforeach
@endforeach
<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/addPenjualan" method="POST">
            <div class="modal-body">
                @csrf
                <label for="nama_barang">Nama Menu</label>
                <select name="nama_barang" id="">
                    @foreach ($menu as $mn)
                        <option value="<?= $mn['id']?>"><?= $mn['nama_menu']?></option>
                    @endforeach
                </select><br><br>
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="jumlah"><br><br>
            </div>
            <div class="modal-footer">
                <a href="/penjualan" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>

<script>
    var table = document.getElementById("dataTable"), sumVal = 0;
    for (var i = 1;i < table.rows.length;i++){
        sumVal = sumVal + parseInt(table.rows[i].cells[4].innerHTML);
    }
    var isi = sumVal;
    document.getElementById('totalDapat').innerHTML ="Rp. " + isi;
    document.getElementById('jual').innerHTML ="Total Penjualan : Rp. " + isi;

    var table1 = document.getElementById("dataTable"), sumBarang = 0;
    for (var j = 1;j < table1.rows.length;j++){
        sumBarang = sumBarang + parseInt(table.rows[j].cells[3].innerHTML);
    }
    var isi2 = sumBarang;
    document.getElementById('totalBarang').innerHTML =isi2 +" Item";

    var table2 = document.getElementById("dataTable"), sumUntung = 0;
    for (var k = 1;k < table2.rows.length;k++){
        sumUntung = sumUntung + parseInt(table.rows[k].cells[5].innerHTML);
    }
    var isi3 = sumUntung;
    document.getElementById('totalUntung').innerHTML ="Rp. " + isi3;
</script>
@endsection