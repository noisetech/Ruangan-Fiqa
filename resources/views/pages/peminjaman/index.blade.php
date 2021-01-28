@extends('layouts.admin')

@section('title', 'Halaman Ruangan')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5 mb-5">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman Ruangan</h1>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- Content Row -->

    <div class="card mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <div class="table">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Waktu Ketersediaan Ruangan</th>
                                <th>Status Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->ruangan->nama_ruangan }}</td>
                                <td>{{ $item->kegiatan}}</td>
                                <td>{{ $item->tanggal_peminjaman}}</td>
                                <td>{{ $item->status_peminjaman }}</td>
                                <td>
                                    <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-sm fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-sm fa-trash"></i>
                                    </button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
