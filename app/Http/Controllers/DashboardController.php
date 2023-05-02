<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Students;
use App\Models\Users;

class DashboardController extends Controller
{

    public function getDashboard()
    {
        $jmlSiswa = Students::where('status', 'aktif')->count();
        $jmlSiswa10 = Students::where('status', 'aktif')->where('class', 'X')->count();
        $jmlSiswa11 = Students::where('status', 'aktif')->where('class', 'XI')->count();
        $jmlSiswa12 = Students::where('status', 'aktif')->where('class', 'XII')->count();
        $siswa = [
            'X' => $jmlSiswa10,
            'XI' => $jmlSiswa11,
            'XII' => $jmlSiswa12,
            'total' => $jmlSiswa,
        ];
        $student=Students::where('haveTrouble', true)->where('troubleStatus', '0')->paginate(5);
        return view('simbiling.dashboard.dashboard', compact('student', 'siswa'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}
