@extends('layouts.app', ['title' => 'Absen'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-8">
            @if ($message = Session::get('alert'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Absen</h6>
                </div>
                @php
                $dt = Carbon\Carbon::now();
                @endphp
                <div class="card-body">
                    <form action="{{ route('guru.absen.update', $absensi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Absen Pulang</label>
                                    <input type="time" name="absen_pulang" readonly value="{{ $dt->toTimeString() }}" required
                                        class="form-control @error('absen_pulang') is-invalid @enderror">

                                    @error('absen_pulang')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mr-1 btn-submit" type="submit">Absen</button>
                        <a href="{{ route('guru.absen.index') }}" class="btn btn-warning btn-reset" type="reset">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Aturan Kehadiran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{  $setting->jam_masuk }}</td>
                                    <td>{{  $setting->jam_pulang }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection