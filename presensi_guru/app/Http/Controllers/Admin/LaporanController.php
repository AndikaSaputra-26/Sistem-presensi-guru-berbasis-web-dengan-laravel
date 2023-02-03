<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use PDF;
class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $absensies = Absensi::when(request()->q, function($absensies) {
            $absensies->whereDate('created_at','>=', request()->q)->whereDate('created_at','<=', request()->r);
        })->paginate(10);
        return view('admin.laporan.index', compact('absensies'));
    }
    public function print(Request $request)
    {
        $absensies = Absensi::when(request()->q, function($absensies) {
            $absensies->whereDate('created_at','>=', request()->q)->whereDate('created_at','<=', request()->r);
        })->paginate(10);
        $pdf = PDF::loadview('admin.laporan.print', compact('absensies'));
        return $pdf->stream('Laporan-Kehadiran.pdf');
    }
}
