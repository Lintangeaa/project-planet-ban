<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterban;
use App\Models\Mastermotor;
use Illuminate\Support\Facades\DB;

class Masterbancontroller extends Controller
{
    public function index(){
        $ban = Masterban::paginate(2);
        $motor = Mastermotor::paginate(2);
        // dd('berhasil icibos');
        
        return response()->view('pages.tools', compact('ban', 'motor'));
    }

    public function search(Request $request) {
        
        return view('pages.tools', [
            $ban = Masterban::where('namaBanSistem', 'LIKE', '%'.$request->search.'%')->paginate(3),
            $motor = Mastermotor::where('namaMotor', 'LIKE', '%'.$request->search.'%')->paginate(3)
        ], compact('ban', 'motor'));
    }

    public function destroy($id)
    {
        $ban = Masterban::where('idBan', $id)->first();
        DB::table('masterban')->where('idBan', $ban->idBan)->delete();

        return redirect()->route('mapping-generator.index')->with('success', 'Data ban berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaBanSistem' => 'required|string|max:255',
            'namaBanUmum' => 'nullable|string|max:255',  
            'ukuranBan' => 'nullable|string|max:255',    
            'ringBan' => 'nullable|integer',            
            'urlBan' => 'nullable|string|max:255',      
        ]);

        Masterban::create([
            'namaBanSistem' => $validatedData['namaBanSistem'],
            'namaBanUmum' => $validatedData['namaBanUmum'] ?? '',
            'ukuranBan' => $validatedData['ukuranBan'] ?? '',
            'ringBan' => $validatedData['ringBan'] ?? 0,
            'urlBan' => $validatedData['urlBan'] ?? '',
        ]);

        return redirect()->route('mapping-generator.index')->with('success', 'Ban berhasil ditambahkan.');
    }


}
