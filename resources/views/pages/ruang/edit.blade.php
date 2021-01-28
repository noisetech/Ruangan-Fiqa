@extends('layouts.admin')

@section('title', 'halaman menambah data ruangan')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Data Ruangan</h1>
    </div>

    <!-- Content Row -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route("ruangan.update", $items->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group @error('nama_ruangan') is-invalid @enderror">
                <label for="nama_ruangan">Nama Ruangan :</label>
                <input type="text" name="nama_ruangan" class="form-control" placeholder="Masukan Nama Ruangan" value="{{ $items->nama_ruangan }}">
                @error('nama_ruangan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group  @error('kapasitas_ruangan') is-invalid @enderror">
                <label for="kapasitas_ruangan">Kapasitas Ruangan :</label>
                <input type="text" name="kapasitas_ruangan" class="form-control" placeholder="Masukan Ketersedian Ruangan" value="{{ $items->kapasitas_ruangan }}">
                @error('kapasitas_ruangan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group  @error('waktu_ketersedian_ruangan') is-invalid @enderror">
                <label for="waktu_ketersedian_ruangan">Waktu Ketersedian Ruangan :</label>
                <input type="text" name="waktu_ketersedian_ruangan" class="form-control" placeholder="Masukan Waktu Ketersedian Ruangan" value="{{ $items->waktu_ketersedian_ruangan }}">
                @error('waktu_ketersedian_ruangan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group @error('status_ruangan') is-invalid @enderror">
                <label for="status_ruangan">Status Ruangan :</label>
                <input type="text" name="status_ruangan" class="form-control" placeholder="Masukan Status Ruangan" value="{{ $items->status_ruangan }}">
                @error('status_ruangan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-block btn-warning" type="submit">
                Ubah
            </button>

            </form>
        </div>
    </div>

</div>
@endsection
