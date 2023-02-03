@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
          <i class="fas fa-ban"></i>
          </div>
          <p class="card-category">Jabatan</p>
          <h3 class="card-title">{{ $jabatan }}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-primary card-header-icon">
          <div class="card-icon">
          <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <p class="card-category">Guru</p>
          <h3 class="card-title">{{ $guru }}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">library_books</i>
          </div>
          <p class="card-category">Absensi</p>
          <h3 class="card-title">{{ $absensi }}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
</div>
@endsection