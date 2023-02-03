@extends('layouts.app', ['title' => 'Guru'])

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
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Guru</h6>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.user.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan NIP">
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
                                    <th scope="col">Username</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gurus as $no => $guru)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($gurus->currentPage()-1) * $gurus->perPage() }}</th>
                                    <td>{{ $guru->user->nama }}</td>
                                    <td>{{ $guru->user->username }}</td>
                                    <td>{{ $guru->nip }}</td>
                                    <td class="text-center d-flex d-inline justify-content-between">
                                        <a href="{{ route('admin.user.edit', $guru->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.user.show', $guru->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.user.delete', $guru->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Apa Anda yakin ?')"; class="btn btn-sm btn-danger">
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
                            {{ $gurus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "{{ route("admin.user.index") }}/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
@endsection