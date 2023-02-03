@extends('layouts.app', ['title' => 'Ubah Setting'])

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
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Ubah Setting</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group bmd-form-group">
                                    <label>Jam Masuk Dari</label>
                                    <input type="time" name="jam_masuk[]" value="{{ json_decode($setting->jam_masuk)[0] }}" required
                                        class="form-control @error('jam_masuk[]') is-invalid @enderror">

                                    @error('jam_masuk[]')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group bmd-form-group">
                                    <label>Jam Masuk Sampai</label>
                                    <input type="time" name="jam_masuk[]" value="{{ json_decode($setting->jam_masuk)[1] }}" required
                                        class="form-control @error('jam_masuk[]') is-invalid @enderror">

                                    @error('jam_masuk[]')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group bmd-form-group">
                                    <label>Jam Pulang</label>
                                    <input type="time" name="jam_pulang" value="{{ $setting->jam_pulang }}" required
                                        class="form-control @error('jam_pulang') is-invalid @enderror">

                                    @error('jam_pulang')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Keterangan</label>
                                    <input type="text" name="keterangan" value="{{ $setting->keterangan }}" required
                                        class="form-control @error('keterangan') is-invalid @enderror">

                                    @error('keterangan')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group bmd-form-group">                      
                                    <label>Status</label>
                                    
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="">~ Status ~</option>
                                        <option value="1" {{ $setting->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $setting->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
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