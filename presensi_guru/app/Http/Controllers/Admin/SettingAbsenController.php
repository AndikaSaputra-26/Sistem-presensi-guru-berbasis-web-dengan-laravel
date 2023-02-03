<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingAbsen;
use Illuminate\Http\Request;

class SettingAbsenController extends Controller
{
    public function index()
    {
        $settings = SettingAbsen::latest()->when(request()->q, function ($settings) {
            $settings = $settings->where('keterangan', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }
    
    public function edit($setting)
    {
        $setting = SettingAbsen::find($setting);
        return view('admin.setting.edit', compact('setting'));
    }
    public function show($setting)
    {
        $setting = SettingAbsen::find($setting);
        return view('admin.setting.show', compact('setting'));
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $requestAll = $request->all();
        $requestAll['jam_masuk'] = json_encode($request->jam_masuk);
        // dd(explode(',',$requestAll['jam_masuk']));
        $setting = SettingAbsen::create($requestAll);
        if($request->status == '1') {
            SettingAbsen::where('id','!=',$setting->id)->update(['status' => '0']);
        }
        return redirect()->route('admin.setting.index')->with('success','Data berhasil diubah');
    }
    public function update(Request $request, $status)
    {
        $setting = SettingAbsen::find($status);
        $requestAll = $request->all();
        $requestAll['jam_masuk'] = json_encode($request->jam_masuk);
        $setting->update($requestAll);
        if($request->status == '1') {
            SettingAbsen::where('id','!=',$setting->id)->update(['status' => '0']);
        }
        return redirect()->route('admin.setting.index')->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $setting = SettingAbsen::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
