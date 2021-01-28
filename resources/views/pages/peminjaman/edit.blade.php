@extends('layouts.admin')

@section('title', 'halaman ubah peminjaman')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5 mb-5">
        <h1 class="h3 mb-0 text-gray-800">Mengubah Data Peminjaman </h1>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- Content Row -->

    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('peminjaman.update', $items->id) }}" method="POST">
            @csrf
            @method('put')


            <div class="form-group @error('kegiatan') is-invalid @enderror">
                <label for="kegiatan">Kegiatan Acara</label>
                <select name="kegiatan" required class="form-control">
                    <option value="{{ $items->kegiatan }}">
                    Kegiatan Sebelumnya( {{ $items->kegiatan }} )
                    </option>

                    <option value="SEMINAR">SEMINAR</option>
                    <option value="RAPAT_ORGANISASI">RAPAT ORGANISASI</option>


                </select>

                @error('kegiatan')
               <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group @error('status_peminjaman') is-invalid @enderror">
                <label for="status_peminjaman">Status Peminjam</label>
                <select name="status_peminjaman" required class="form-control">
                    <option value="{{ $items->status_peminjaman }}">
                     Status Sebelumnya ( {{ $items->status_peminjaman }} )
                    </option>

                    <option value="SUKSES">Sukses</option>
                    <option value="GAGAL">Gagal</option>

                </select>

                @error('status_peminjaman')
               <div class="alert alert-danger">{{ $message }}</div>
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
