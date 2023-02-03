<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('auth.daftar', compact('jabatans'));
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
        return redirect(route('login'))->with('success', 'Pendaftaran berhasil. Silahkan Masuk');
    }
}
