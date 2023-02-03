<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\SettingAbsen;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensies = Absensi::latest()->when(request()->q, function ($absensies) {
            $absensies = $absensies->whereHas('guru', function($q) {
                $q->whereHas('user', function($w) {
                    $w->where('nama', 'like', '%'. request()->q . '%');
                });
            });
        })->paginate(10);
        $setting = SettingAbsen::where('status', '1')->first();
        return view('admin.absensi.index', compact('absensies','setting'));
    }

    public function create()
    {
        $setting = SettingAbsen::where('status','1')->first();
        return view('admin.absensi.create', compact('setting'));
    }
    
    public function edit($id)
    {
        $absensi = Absensi::find($id)->first();
        $setting = SettingAbsen::where('status','1')->first();
        return view('admin.absensi.edit', compact('setting','absensi'));
    }
    public function show($setting)
    {
        $setting = Absensi::find($setting);
        return view('admin.absensi.show', compact('setting'));
    }
    public function delete($id)
    {
        $setting = Absensi::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
