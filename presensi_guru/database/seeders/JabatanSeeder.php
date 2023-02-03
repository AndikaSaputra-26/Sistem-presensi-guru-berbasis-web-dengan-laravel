<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama' => 'Direktur'
        ]);
        Jabatan::create([
            'nama' => 'Profesor'
        ]);
    }
}
