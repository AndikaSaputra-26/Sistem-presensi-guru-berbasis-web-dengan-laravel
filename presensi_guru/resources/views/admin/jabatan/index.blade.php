@extends('layouts.app', ['title' => 'Jabatan'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header d-flex d-inline justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Jabatan</h6>
                    <a href="{{ route('admin.jabatan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.jabatan.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan nama jabatan">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">No.</th>
                                    <th scope="col">Nama Jabatan</th>
                                    <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jabatans as $no => $jabatan)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($jabatans->currentPage()-1) * $jabatans->perPage() }}</th>
                                    <td>{{ $jabatan->nama }}</td>
                                    <td class="text-center d-flex d-inline justify-content-between">
                                        <a href="{{ route('admin.jabatan.edit', $jabatan->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.jabatan.show', $jabatan->id) }}"
                                            class="btn btn-sm btn-info">
                                         <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.jabatan.delete', $jabatan->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apa Anda yakin ?')" class="btn btn-sm btn-danger"
                                                id="{{ $jabatan->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty

                                    <div class="alert alert-danger">
                                        Data Belum Tersedia!
                                    </div>
                                
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $jabatans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection