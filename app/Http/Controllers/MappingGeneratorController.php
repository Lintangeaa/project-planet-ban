<?php

namespace App\Http\Controllers;

use App\Models\MappingGenerator;
use App\Models\Masterban;
use App\Models\Mastermotor;
use Illuminate\Http\Request;

class MappingGeneratorController extends Controller
{
    public function index(Request $request)
    {
        $searchBan = $request->input('searchBan'); // Ambil parameter pencarian untuk tabel Ban
        $searchMotor = $request->input('searchMotor'); // Ambil parameter pencarian untuk tabel Motor
    
        // Query untuk Ban dengan pencarian dan pagination
        $bans = Masterban::when($searchBan, function ($query, $searchBan) {
            $query->where('namaBanSistem', 'like', '%' . $searchBan . '%')
                  ->orWhere('namaBanUmum', 'like', '%' . $searchBan . '%')
                  ->orWhere('ukuranBan', 'like', '%' . $searchBan . '%');
        })->paginate(5, ['*'], 'ban_page');
    
        // Query untuk Motor dengan pencarian dan pagination
        $motors = Mastermotor::when($searchMotor, function ($query, $searchMotor) {
            $query->where('namaMotor', 'like', '%' . $searchMotor . '%')
                  ->orWhere('ringMotorStd', 'like', '%' . $searchMotor . '%');
        })->paginate(5, ['*'], 'motor_page');
    
        return view('pages.mapping-generator.index', compact('motors', 'bans', 'searchBan', 'searchMotor'));
    }  
    
    public function store(Request $request)
    {
        $input = $request->validate([
            'idBan' => 'required',
            'idMotor' => 'required',
        ]);

        MappingGenerator::create($input);
    
        return redirect()->route('mapping-generator.index');
    }
}
