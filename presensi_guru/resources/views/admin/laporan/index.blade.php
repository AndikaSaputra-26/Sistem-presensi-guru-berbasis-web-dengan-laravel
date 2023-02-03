@extends('layouts.app', ['title' => 'Absensi'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            @if (request()->q || request()->r)
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Menampilkan data hasil filter dari tanggal {{ request()->q }} Sampai Tanggal {{ request()->r }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row d-inline d-flex justify-content-between">
                            <form action="{{ route('admin.laporan.index') }}" method="GET">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        
                                        <div class="form-group bmd-form-group">
                                            <label>Dari Tanggal</label>
                                            <input type="date" name="q" value="{{ request()->q ? request()->q : '' }}" required
                                                class="form-control @error('q') is-invalid @enderror">

                                            @error('q')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group bmd-form-group">
                                            <label>Sampai Tanggal</label>
                                            <input type="date" name="r" value="{{ request()->r ? request()->r : ''  }}" required
                                                class="form-control @error('r') is-invalid @enderror">

                                            @error('r')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-sm" style="height:38px !important;">CARI</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <form action="{{ route('admin.laporan.print') }}" method="post">
                                @csrf
                                <input type="hidden" name="q" value="{{ request()->q ? request()->q : ''  }}">
                                <input type="hidden" name="r" value="{{ request()->r ? request()->r : ''  }}">
                                <button type="submit" class="btn btn-primary btn-sm">Cetak</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">No.</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Jam Pulang</th>
                                    <th scope="col">Absen Masuk</th>
                                    <th scope="col">Absen Pulang</th>
                                    <th scope="col">Tanggal Presensi</th>
                                    <th scope="col">Aturan Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($absensies as $no => $absensi)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($absensies->currentPage()-1) * $absensies->perPage() }}</th>
                                    <td>{{ $absensi->guru->user->nama }}</td>
                                    <td>{{ json_decode($absensi->settingAbsen->jam_masuk)[0] }} -  {{ json_decode($absensi->settingAbsen->jam_masuk)[1] }} </td>
                                    <td>{{ $absensi->settingAbsen->jam_pulang }}</td>
                                    <td>{{ $absensi->absen_masuk }}
                                        @if($absensi->absen_masuk)
                                        @php
                                        $setting = $absensi->settingAbsen->jam_masuk;
                                        @endphp
                                            @if( $absensi->absen_masuk > json_decode($setting)[1] )
                                            <span class="badge badge-danger">Terlambat</span>
                                            @else
                                            <span class="badge badge-info">Tepat Waktu</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $absensi->absen_pulang }}
                                        
                                        @if($absensi->absen_pulang)
                                            @if( $absensi->absen_pulang < $absensi->settingAbsen->jam_pulang )
                                            <span class="badge badge-danger">Pulang Cepat</span>
                                            @else
                                            <span class="badge badge-info">Tepat Waktu</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ date('Y-m-d', strtotime($absensi->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.setting.index') }}">{{ $absensi->settingAbsen->keterangan }}</a>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Belum Tersedia!</td>
                                </tr>
                                
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $absensies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection