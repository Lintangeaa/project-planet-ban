<?php

namespace App\Http\Controllers;

use App\Models\Masterban;
use App\Models\Mastermotor;
use App\Models\MappingGenerator;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data untuk dashboard
        $totalBans = Masterban::count();
        $totalMotors = Mastermotor::count();
        $totalMappings = MappingGenerator::count();

        // Menampilkan data ke halaman dashboard
        return view('pages.dashboard', compact('totalBans', 'totalMotors', 'totalMappings'));
    }
}
