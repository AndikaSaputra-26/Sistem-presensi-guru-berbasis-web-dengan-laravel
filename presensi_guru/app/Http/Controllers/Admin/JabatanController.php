<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::latest()->when(request()->q, function ($jabatans) {
            $jabatans = $jabatans->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('admin.jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        return view('admin.jabatan.create');
    }
    
    public function edit($jabatan)
    {
        $jabatan = Jabatan::find($jabatan);
        return view('admin.jabatan.edit', compact('jabatan'));
    }
    public function show($jabatan)
    {
        $jabatan = Jabatan::find($jabatan);
        return view('admin.jabatan.show', compact('jabatan'));
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
        $jabatan = Jabatan::create($requestAll);

        if ($jabatan) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.jabatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.jabatan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request)
    {
        $jabatan = Jabatan::findOrFail($request->id);
        $jabatan->update(['nama'=>$request->nama]);
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $jabatan = Jabatan::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
