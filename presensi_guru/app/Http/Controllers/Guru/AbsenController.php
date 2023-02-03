<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\SettingAbsen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $guru = Guru::where('user_id', auth()->user()->id)->first();
        $absensies = Absensi::latest()->when(request()->q, function ($absensies) {
            $absensies = $absensies->whereDate('created_at', request()->q);
        })->where('guru_id', $guru->id)->paginate(10);
        $setting = SettingAbsen::where('status', '1')->first();
        return view('guru.absensi.index', compact('absensies','setting'));
    }

    public function create()
    {
        $setting = SettingAbsen::where('status','1')->first();
        return view('guru.absensi.create', compact('setting'));
    }
    
    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $setting = SettingAbsen::where('status','1')->first();
        return view('guru.absensi.edit', compact('setting','absensi'));
    }
    public function show($setting)
    {
        $setting = Absensi::find($setting);
        return view('guru.absensi.show', compact('setting'));
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $guru = Guru::where('user_id', auth()->user()->id)->first();
        $setting = SettingAbsen::where('status', '1')->first();
        $mytime = \Carbon\Carbon::now();
        if(json_decode($setting->jam_masuk)[0] > date('H:i', strtotime($mytime->toTimeString()))){
            return redirect()->back()->with('alert','Belum waktunya untuk presensi');
        }
        $absensi = Absensi::where('guru_id', $guru->id)->whereDate('created_at', date('Y-m-d'))->first();
        if($absensi) {
            return redirect()->back()->with('alert','Anda hari ini telah absen');
        }
        Absensi::create([
            'guru_id' => $guru->id,
            'setting_absen_id' => $setting->id,
            'absen_masuk' => $request->absen_masuk,
        ]);
        return redirect()->route('guru.absen.index')->with('success','Data berhasil diubah');
    }
    public function update(Request $request, $status)
    {
        $absensi = Absensi::find($status);
        $absensi->update(['absen_pulang'=>$request->absen_pulang]);
        return redirect()->route('guru.absen.index')->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $setting = Absensi::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
