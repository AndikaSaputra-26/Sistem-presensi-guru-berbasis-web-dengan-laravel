@extends('layouts.app', ['title' => 'Absensi'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="{{ route('admin.absensi.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan nama guru">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    <th>Tanggal Presensi</th>
                                    <th scope="col">Aturan Kehadiran</th>
                                    <th scope="col">Aksi</th>
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
                                    <td class="text-center d-flex d-inline">
                                        <form action="{{ route('guru.absen.delete', $absensi->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apa Anda yakin ?')" class="btn btn-sm btn-danger"
                                                id="{{ $absensi->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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