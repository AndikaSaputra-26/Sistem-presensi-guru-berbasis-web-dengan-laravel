<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'nama' => 'Admin',
            'jenis_kelamin' => 'l',
        ]);
        User::create([
            'username' => 'user',
            'password' => bcrypt('password'),
            'role' => 'user',   
            'nama' => 'Asep Saepudin',
            'jenis_kelamin' => 'l',
        ]);
        Guru::create([
            'user_id' => '2',
            'jabatan_id' => '1',
            'nip' => '1',
            'sertifikasi' => 'sudah',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-12-01',
            'agama' => 'islam',
            'alamat' => 'Jakarta Barat',
            'pendidikan' => 'S1',
            'mapel_diampu' => 'Matematika',
            'status_kepegawaian' => 'Tetap',
        ]);
    }
}
