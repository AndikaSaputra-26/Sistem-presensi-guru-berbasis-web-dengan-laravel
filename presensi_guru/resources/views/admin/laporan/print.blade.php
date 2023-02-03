<style>
.hijau {
    background-color: #13a15a;
}
.merah {
    background-color: #e63746;
}    
#tab {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tab td, #tab th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tab tr:nth-child(even){background-color: #f2f2f2;}

#tab tr:hover {background-color: #ddd;}

#tab th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.logo{
    height:140px;
    width:140px;
    float:left;
    margin-top:-2px;
    margin-left: -80px;
}
.footer{
    float: right;
}
.footer .body{
    margin-top: 70px;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
        <div class="heading">
        
        @php
            $public = 'images/logo/logo.jpeg';
            $image = base64_encode(file_get_contents(public_path($public)));
        @endphp
            <img src="data:image/png;base64,{{ $image }}" class="logo"> <br>
            <center>
            <h3>SMP MUHAMMADIYAH SUSUKAN </h3>
            Jl. Sruwen-Karanggede KM.15<br>
            Desa Gentan, Kecamatan Susukan, Kabupaten Semarang<br>
            Kode Pos 50777. Telp 0298 615126<br>
            </center>
        </div>
    </div>
    <hr>
<h4>Laporan Kehadiran {{ request()->q ? 'dari tanggal' : ''}} {{ request()->q ? request()->q : ''}} {{ request()->r ? 'sampai tanggal' : ''}} {{ request()->r ? request()->r : ''}}</h4>
<table id="tab">
    <tr>
        <th>No.</th>
        <th>Nama Guru</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Absen Masuk</th>
        <th>Absen Pulang</th>
        <th>Tanggal Presensi</th>
        <th>Aturan Kehadiran</th>
    </tr>
    @forelse ($absensies as $no => $absensi)
    <tr>
        <td>{{ ++$no + ($absensies->currentPage()-1) * $absensies->perPage() }}</td>
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
        <td>{{ $absensi->settingAbsen->keterangan }}</td>
      </tr>

    @empty
    <tr colspan="7">
        <td>Data Belum Tersedia!</td>
    </tr>        
    @endforelse
</table>