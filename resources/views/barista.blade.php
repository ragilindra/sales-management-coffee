@extends('layout.app')

@section('title', 'Halaman Barista')

@section('content')

<main>
    
    <div class="container-fluid">
    <h5 class="mt-4 mb-5">Barista</h5>
    @if(session()->has('success'))
        <div class="alert alert-success">
          {{session()->get('success')}}
        </div>
    @endif
    <!-- tabel alat -->
    <div class="card mb-4">
        <div class="row">
        <div class="col"><h5 class="mt-4 ml-3">Data Barista</h5></div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-primary mt-4 mr-4" data-toggle="modal" data-target="#tambahBarista"><i class="fas fa-plus"></i> Tambah Barista Baru</button>
        </div>
        </div>

        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>NO</th>
                <th>NAMA BARISTA</th>
                <th>GAJI</th>
                <th>SHIFT</th>
                <th>OPSI</th>
                </tr>
            </thead>

            <tbody>
                @foreach($barista as $br)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td><?= $br['nama']; ?></td>
                <td>
                    <div class="row">
                        <div class="col"><?= $br['gaji']; ?></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col"><?= $br['shift']; ?></div>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning ml-2 mt-1" style="width: 60px" data-toggle="modal" data-target="#edit{{$br['id']}}">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger ml-2 mt-1" style="width: 60px" data-toggle="modal" data-target="#delete{{$br['id']}}" >Hapus</button>
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
    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahBarista" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Data Barista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/addBarista" method="POST">
            <div class="modal-body">
                @csrf
                <label for="nama">Nama Barista</label>
                <input type="text" name="nama" id="nama" class="col"><br><br>
                <label for="gaji">Gaji</label>
                <input type="text" name="gaji" id="gaji" class="col"><br><br>
                <label for="shift">Shift</label>
                <input type="text" name="shift" id="shift" class="col"><br><br>
                
            </div>
            <div class="modal-footer">
                <a href="/barista" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
    </div>
    <!-- End Tambah Modal -->
    <!-- Hapus Modal -->
    @foreach($barista as $br)
    <div class="modal fade" id="delete{{$br['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus data Barista?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">Jika Anda menekan "yakin" maka data barista akan dihapus dari tabel.</div>
        <div class="modal-footer">
            <a href="/barista" class="btn btn-secondary">Batal</a>
            <a href="/deleteBarista/<?= $br['id'] ?>" class="btn btn-primary">Yakin</a>
        </div>
    </div>
    </div>
    </div>
    <!-- End Hapus Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit{{$br['id']}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail info alat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/editBarista/<?= $br['id'] ?>" method="post">
            @csrf
            <div class="modal-body">
                <label for="id">Edit Barista</label>
                <input type="text" name="id" id="" class="col" value="<?=  $br['id'] ?>" readonly><br><br>
                <label for="id">Nama</label>
                <input type="text" name="nama" id="" class="col" value="<?=  $br['nama'] ?>"><br><br>
                <label for="id">Gaji</label>
                <input type="text" name="gaji" id="" class="col" value="<?=  $br['gaji'] ?>"><br><br>
                <label for="id">Shift</label>
                <input type="text" name="shift" id="" class="col" value="<?=  $br['shift'] ?>"><br><br>
            </div>
            <div class="modal-footer">
                <a href="/barista" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</div>
@endforeach
    <!-- End Edit Modal -->
    <!-- akhir modals -->
@endsection