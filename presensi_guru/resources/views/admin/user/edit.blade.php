@extends('layouts.app', ['title' => 'Ubah User'])

@section('content')
<div class="container-fluid">

<form action="{{ route('admin.user.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
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
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Ubah User</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">NIP ( default username & password )</label>
                                <input type="text" name="nip" value="{{ $guru->nip }}" required
                                    class="form-control @error('nip') is-invalid @enderror">

                                @error('nip')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">NAMA LENGKAP</label>
                                <input type="text" name="nama_lengkap" value="{{ $guru->user->nama }}" required
                                    class="form-control @error('nama_lengkap') is-invalid @enderror">

                                @error('nama_lengkap')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                                  
                                <label class="bmd-label-floating">Tempat Lahir</label>
                                <input type="tempat_lahir" name="tempat_lahir" value="{{ $guru->tempat_lahir }}" required
                                    class="form-control @error('tempat_lahir') is-invalid @enderror">

                                @error('tempat_lahir')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" required
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror">

                                @error('tanggal_lahir')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label class="bmd-label-floating">Agama</label>
                                <input type="text" name="agama" value="{{ $guru->agama }}" required
                                    class="form-control @error('agama') is-invalid @enderror">

                                @error('agama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label class="bmd-label-floating">Alamat</label>
                                <input type="text" name="alamat" value="{{ $guru->alamat }}" required
                                    class="form-control @error('alamat') is-invalid @enderror">

                                @error('alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label class="bmd-label-floating">Pendidikan</label>
                                <input type="text" name="pendidikan" value="{{ $guru->pendidikan }}" required
                                    class="form-control @error('pendidikan') is-invalid @enderror">

                                @error('pendidikan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label class="bmd-label-floating">Mapel Diampu</label>
                                <input type="text" name="mapel_diampu" value="{{ $guru->mapel_diampu }}" required
                                    class="form-control @error('mapel_diampu') is-invalid @enderror">

                                @error('mapel_diampu')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label>Sertifikasi</label>
                                <select name="sertifikasi" id="sertifikasi"
                                    class="form-control @error('sertifikasi') is-invalid @enderror" required>
                                    <option value="">~ Sertifikasi ~</option>
                                    <option value="sudah" {{$guru->sertifikasi == 'sudah' ? 'selected' : ''}}>Sudah</option>
                                    <option value="belum" {{$guru->sertifikasi == 'belum' ? 'selected' : ''}}>Belum</option>
                                </select>
                                @error('sertifikasi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label class="bmd-label-floating">Status Kepegawaian</label>
                                <input type="text" name="status_kepegawaian" value="{{ $guru->status_kepegawaian }}" required
                                    class="form-control @error('status_kepegawaian') is-invalid @enderror">

                                @error('status_kepegawaian')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="l" {{$guru->user->jenis_kelamin == 'l' ? 'selected' : ''}}>Laki - Laki</option>
                                    <option value="p" {{$guru->user->jenis_kelamin == 'p' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">                      
                                <label>Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id"
                                    class="form-control @error('jalur_pendaftaran') is-invalid @enderror" required>
                                    <option value="">~ Pilih Jabatan ~</option>
                                    @foreach($jabatans as $jabatan)
                                        @if($jabatan->id == $guru->jabatan_id)
                                        <option value="{{ $jabatan->id }}" selected>{{ $jabatan->nama }}</option>
                                        @else
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Akun User</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" name="username" value="{{ $guru->user->username }}" required
                                    class="form-control @error('username') is-invalid @enderror">

                                @error('username')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="password" value="" 
                                    class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-file-upload form-file-multiple">
                                <input type="file" multiple="" class="inputFileHidden" name="foto">
                                <div class="input-group">
                                    <input type="text" class="form-control inputFileVisible" placeholder="Upload Foto">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">attach_file</i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">                        
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">Ubah</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-reset" type="reset">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- /.container-fluid -->
@endsection