@extends('layouts.app', ['title' => 'Setting Absen'])

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
                <div class="card-header d-flex d-inline justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Setting Absen</h6>
                    <a href="{{ route('admin.setting.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.setting.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan status">
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
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Jam Pulang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($settings as $no => $setting)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($settings->currentPage()-1) * $settings->perPage() }}</th>
                                    <td>
                                        @php
                                        $str = " -";
                                        $total = count(json_decode($setting->jam_masuk));

                                        @endphp
                                        @foreach(json_decode($setting->jam_masuk) as $key => $s)
                                           <b> {{$key+1 < 2 ? $s .= $str : $s}}</b>
                                        @endforeach
                                    </td>
                                    <td>{{ $setting->jam_pulang }}</td>
                                    <td>{{ $setting->keterangan }}</td>
                                    <td>{{ $setting->status == '0' ? 'Tidak Aktif' : 'Aktif' }}</td>
                                    <td class="text-center d-flex d-inline justify-content-between">
                                        <a href="{{ route('admin.setting.edit', $setting->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.setting.delete', $setting->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apa Anda yakin ?')" class="btn btn-sm btn-danger"
                                                id="{{ $setting->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty

                                    <div class="alert alert-danger">
                                        Data Belum Tersedia!
                                    </div>
                                
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $settings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection