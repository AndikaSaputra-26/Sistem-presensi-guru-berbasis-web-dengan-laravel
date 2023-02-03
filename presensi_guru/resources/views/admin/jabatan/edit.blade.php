@extends('layouts.app', ['title' => 'Ubah Jabatan'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Ubah Jabatan</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.jabatan.update', $jabatan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Nama Jabatan</label>
                                    <input type="text" name="nama"  value="{{ $jabatan->nama }}" required
                                        class="form-control @error('nama') is-invalid @enderror">

                                    @error('nama')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit">
                            Ubah</button>
                        <a href="{{ route('admin.jabatan.index') }}" class="btn btn-warning btn-reset" type="reset">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection