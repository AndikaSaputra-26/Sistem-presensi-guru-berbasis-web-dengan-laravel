@extends('layouts.auth', ['title' => 'Form Pendaftaran'])
<style>
.btn-login {
    background-color: #007BFF !important;
    color: white !important;
    font-weight: bold !important;
}
</style>
@section('content')
    <body>
        
    <div class="container-fluid">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-8 mt-1">
                <div class="card o-hidden border-0 shadow-lg mb-3 mt-1">
                    <div class="card-body p-4">
                      <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <img src="{{ url('images/logo/login.jfif') }}"
                                style="width: 100%;height:100%;">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="text-center">
                                <h1 class="h5 text-gray-900 mb-3 mt-3">FORM PENDAFTARAN</h1>
                            </div>
                            <hr>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Nama Lengkap</label>
                                    <input type="type" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" required>
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Jalur Pendaftaran</label>
                                    <select name="jalur_pendaftaran" id="jalur_pendaftaran" class="custom-select" required>
                                        <option value="">~ Pilih ~</option>
                                        <option value="reguler">Reguler</option>
                                        <option value="yatim">Yatim</option>
                                    </select>
                                    @error('jalur_pendaftaran')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Username</label>
                                    <input type="type" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" required>
                                    @error('username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Masukkan Konfirmasi Password" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-block" style="background-color: #C55757;color:white;">DAFTAR</button>
                                <hr>
                
                                <a href="/" style="color:#C55757;">Kembali</a>
                
                            </form>
                                
                        </div>
                      </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

@endsection