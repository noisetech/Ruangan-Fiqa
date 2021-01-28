@extends('layouts.admin')

@section('title', 'Halaman Ruangan')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Data Ruangan</h1>
        <a href="{{ route('ruangan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Data Ruangan</a>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- Content Row -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="table">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Kapasitas Ruangan</th>
                                <th>Waktu Ketersediaan Ruangan</th>
                                <th>Status Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_ruangan }}</td>
                                <td>{{ $item->kapasitas_ruangan }}</td>
                                <td>{{ $item->waktu_ketersedian_ruangan }}</td>
                                <td>{{ $item->status_ruangan }}</td>
                                <td>
                                    <a href="{{ route('ruangan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-sm fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('ruangan.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                     @csrf
                                     @method('delete')

                                     <button class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Menghapus Data?');">
                                        <i class="fas fa-sm fa-trash"></i>
                                     </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">
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
