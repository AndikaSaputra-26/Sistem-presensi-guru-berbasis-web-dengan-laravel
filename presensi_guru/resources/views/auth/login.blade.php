@extends('layouts.auth', ['title' => 'Masuk'])
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
            <div class="col-md-8 mt-2">
                
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
                <div class="card o-hidden border-0 shadow-lg mb-3 mt-5">
                    <div class="card-body p-4">
                      <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <img src="{{ url('images/logo/logo.jpeg') }}"
                                style="width: 100%;height:100%;">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="text-center">
                                <h1 class="h5 text-gray-900 mb-3 mt-3">Selamat Datang <br> <hr> SMP Muhammadiyah Susukan</h1>
                            </div>
                            <hr>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Username</label>
                                    <input type="type" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username">
                                    @error('username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-uppercase">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-block" style="background-color: #C55757;color:white;">MASUK</button>
                                <hr>                
                            </form>
                            <a href="{{ route('daftar') }}">Daftar</a>  |
                            <a href="{{ route('lupa_password.index') }}">Lupa Password</a>  
                        </div>
                      </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

@endsection