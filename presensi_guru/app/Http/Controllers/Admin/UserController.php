<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->when(request()->q, function ($gurus) {
            $gurus = $gurus->where('nip', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('admin.user.index', compact('gurus'));
    }
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('admin.user.create', compact('jabatans'));
    }
    public function edit($guru)
    {
        $guru = Guru::find($guru);
        $jabatans = Jabatan::all();
        return view('admin.user.edit', compact('jabatans','guru'));
    }
    public function show($guru)
    {
        $guru = Guru::find($guru);
        return view('admin.user.show', compact('guru'));
    }
    public function store(Request $request)
    {
        if($request->foto) {
            $this->validate($request, [
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            ]);
            if ($request->foto) {
                $photo = $request->file('foto');
                $size = $photo->getSize();
                $namePhoto = time() . "_" . $photo->getClientOriginalName();
                $path = 'fotos';
                $photo->move($path, $namePhoto);
                $requestAll['foto'] = $namePhoto;
            }
        }
        
        $this->validate($request, [
            'nip' => 'required|unique:guru',
            'username' => 'required|unique:users',
        ]);
        $user = User::create([
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'foto' => $requestAll['foto'] ?? null,
            'role' => 'user',
        ]);
        Guru::create([
            'user_id' => $user->id,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'mapel_diampu' => $request->mapel_diampu,
            'sertifikasi' => $request->sertifikasi,
            'status_kepegawaian' => $request->status_kepegawaian,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update(Request $request, $guru)
    {
        $guru = Guru::find($guru);
        if($request->foto) {
            $this->validate($request, [
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            ]);

            $imgWillDelete = public_path()  . '/fotos/' . $guru->user->foto;
            File::delete($imgWillDelete);
            
            $photo = $request->file('foto');
            $size = $photo->getSize();
            $namePhoto = time() . "_" . $photo->getClientOriginalName();
            $path = 'fotos';
            $photo->move($path, $namePhoto);
            $requestAll['foto'] = $namePhoto;
        }
        if($request->nip != $guru->nip){
            $this->validate($request, [
                'nip' => 'required|unique:guru,nip,'. $guru->id,
            ]);
        }
        $user = User::find($guru->user_id);
        if($request->password){
            $user->update([
                'nama' => $request->nama_lengkap,
                'username' => $request->username,
                'jenis_kelamin' => $request->jenis_kelamin,
                'role' => 'user',
                'password' => bcrypt($request->password),
                'foto' => $requestAll['foto'] ?? $user->foto
            ]);
        }else{
            $user->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'nama' => $request->nama_lengkap,
                'username' => $request->username,
                'role' => 'user',
                'foto' => $requestAll['foto'] ?? $user->foto
            ]);
        }
        $guru->update([
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'mapel_diampu' => $request->mapel_diampu,
            'sertifikasi' => $request->sertifikasi,
            'status_kepegawaian' => $request->status_kepegawaian,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function delete(Request $request, $guru)
    {
        $guru = Guru::find($guru)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
