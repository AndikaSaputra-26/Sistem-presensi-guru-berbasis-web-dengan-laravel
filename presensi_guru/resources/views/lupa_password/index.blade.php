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
            <div class="col-md-8 mt-5">
                
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
                <div class="card o-hidden border-0 shadow-lg mb-3 mt-5">
                    <div class="card-header">
                        Reset Password
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lupa_password.update') }}" method="post">
                            @csrf
                            <div class="form-group">`
                                <label class="font-weight-bold text-uppercase">Masukkan Username</label>
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" required>
                                @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-uppercase">Password Baru</label>
                                <input type="text" name="password_baru" value="{{ old('password_baru') }}" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Masukkan Password Baru" required>
                                @error('password_baru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block" style="background-color: #C55757;color:white;">Reset Password</button>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <a href="{{ route('login') }}">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

@endsection