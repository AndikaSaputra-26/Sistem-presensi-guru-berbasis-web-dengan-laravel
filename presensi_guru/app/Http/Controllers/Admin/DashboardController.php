<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jabatan =  Jabatan::count();
        $guru =  Guru::count();
        $absensi =  Absensi::count();
        return view('admin.dashboard.index', compact('jabatan', 'guru', 'absensi'));
    }
}
