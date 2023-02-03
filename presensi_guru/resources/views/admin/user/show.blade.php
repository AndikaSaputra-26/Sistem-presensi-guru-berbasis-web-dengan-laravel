@extends('layouts.app', ['title' => 'Detail Guru'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Detail Guru</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">NIP</th>
                                    <th>{{ $guru->nip }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 30%;">Nama Lengkap</th>
                                    <th>{{ $guru->user->nama }}</th>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <th>{{ $guru->tempat_lahir }}</th>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th>{{ $guru->tanggal_lahir }}</th>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <th>{{ $guru->agama }}</th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>{{ $guru->alamat }}</th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>{{ $guru->alamat }}</th>
                                </tr>
                                <tr>
                                    <th>Pendidikan</th>
                                    <th>{{ $guru->pendidikan }}</th>
                                </tr>
                                <tr>
                                    <th>Mapel Diampu</th>
                                    <th>{{ $guru->mapel_diampu }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>{{ $guru->user->jenis_kelamin == 'l' ? 'Laki - Laki' : 'Perempuan' }}</th>
                                </tr>
                                <tr>
                                    <th>Sertifikasi</th>
                                    <th>{{ $guru->sertifikasi }}</th>
                                </tr>
                                <tr>
                                    <th>Status Kepegawaian</th>
                                    <th>{{ $guru->status_kepegawaian }}</th>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <th>
                                        <img src="{{ url('fotos/'. $guru->user->foto) }}" class="rounded" style="width:100px"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection