@extends('layouts.auth', ['title' => 'Form Pendaftaran'])
<style>
.btn-login {
    background-color: #007BFF !important;
    color: white !important;
    font-weight: bold !important;
}
</style>
@section('content')
    <body style="">
        
    <div class="container-fluid">

        <!-- Outer Row -->
        <form action="{{ route('daftar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8 mt-1">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="card o-hidden border-0 shadow-lg mb-3 mt-1">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">NIP</label>
                                        <input type="number" name="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan NIP" required>
                                        @error('nip')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" required>
                                        @error('nama_lengkap')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan Tempat Lahir" required>
                                        @error('tempat_lahir')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir" required>
                                        @error('tanggal_lahir')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Agama</label>
                                        <input type="text" name="agama" value="{{ old('agama') }}" class="form-control @error('agama') is-invalid @enderror" placeholder="Masukkan Agama" required>
                                        @error('agama')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" required
                                                class="form-control @error('jalur_pendaftaran') is-invalid @enderror">
                                                <option value="">~ Jenis Kelamin ~</option>
                                                <option value="l">Laki - Laki</option>
                                                <option value="p">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card o-hidden border-0 shadow-lg mb-3 mt-1">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Alamat</label>
                                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" required>
                                        @error('alamat')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Pendidikan</label>
                                        <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="form-control @error('pendidikan') is-invalid @enderror" placeholder="Masukkan Pendidikan" required>
                                        @error('pendidikan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Mapel Diampu</label>
                                        <input type="text" name="mapel_diampu" value="{{ old('mapel_diampu') }}" class="form-control @error('mapel_diampu') is-invalid @enderror" placeholder="Masukkan Mapel Diampu" required>
                                        @error('mapel_diampu')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Sertifikasi</label>
                                        <select name="sertifikasi" id="sertifikasi" required
                                                class="form-control @error('sertifikasi') is-invalid @enderror">
                                                <option value="">~ Sertifikasi ~</option>
                                                <option value="sudah">Sudah</option>
                                                <option value="belum">Belum</option>
                                        </select>
                                        @error('sertifikasi')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Status Kepegawaian</label>
                                        <input type="text" name="status_kepegawaian" value="{{ old('status_kepegawaian') }}" class="form-control @error('status_kepegawaian') is-invalid @enderror" placeholder="Masukkan Status Kepegawaian" required>
                                        @error('status_kepegawaian')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Jabatan</label>
                                        <select name="jabatan_id" id="jabatan_id" required
                                                class="form-control @error('jalur_pendaftaran') is-invalid @enderror">
                                                <option value="">~ Pilih Jabatan ~</option>
                                                @foreach($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->id }}" >{{ $jabatan->nama }}</option>
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
                        <div class="col-lg-4 col-sm-12">
                            <div class="card o-hidden border-0 shadow-lg mb-3 mt-1">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Username</label>
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" required>
                                        @error('username')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" required>
                                        @error('password')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase">Foto</label>
                                        <input type="file" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror" required>
                                        @error('foto')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-block" style="background-color: #C55757;color:white;">DAFTAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

@endsection