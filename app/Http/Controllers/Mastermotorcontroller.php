<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mastermotor;
use App\Models\Masterban;
use Illuminate\Support\Facades\DB;

class Mastermotorcontroller extends Controller
{
    public function index(){
        $ban = Masterban::paginate(2);
        $motor = Mastermotor::paginate(2);
        
         return response()->view('pages.tools', compact('motor', 'ban'));
    }

    public function search(Request $request) {
        
        return view('pages.tools', [
            $ban = Masterban::where('namaBanSistem', 'LIKE', '%'.$request->search.'%')->paginate(3),
            $motor = Mastermotor::where('namaMotor', 'LIKE', '%'.$request->search.'%')->paginate(3)
        ], compact('ban', 'motor'));
    }

    public function destroy($id)
    {
        $motor = Mastermotor::where('idMotor', $id)->first();
        DB::table('mastermotor')->where('idMotor', $motor->idMotor)->delete();

        return redirect()->route('mapping-generator.index')->with('success', 'Data motor berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaMotor' => 'required|string|max:255',
            'ringMotorStd' => 'nullable|integer',
            'banDepan' => 'nullable|string|max:255',
            'banBelakang' => 'nullable|string|max:255',
        ]);

        Mastermotor::create([
            'namaMotor' => $validatedData['namaMotor'],
            'ringMotorStd' => $validatedData['ringMotorStd'] ?? 0,
            'banDepan' => $validatedData['banDepan'] ?? '',
            'banBelakang' => $validatedData['banBelakang'] ?? '',
        ]);

        return redirect()->route('mapping-generator.index')->with('success', 'Motor berhasil ditambahkan.');
    }
}
