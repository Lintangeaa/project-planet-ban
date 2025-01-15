<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterfisik;
use App\Models\Masterban;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Masterfisikcontroller extends Controller
{
    // public function index(){
    //     $fisik = Masterfisik::all();
    //     //dd('berhasil iciboss');
    //     return response()->view('pages.fisik', compact('fisik'));
    // }

    public function index(Request $request) {
        $search = $request->get('search');
        
        // Build the query based on search input
        $query = Masterfisik::with('masterBan');
        
        if ($search) {
            $query->whereHas('masterBan', function ($query) use ($search) {
                $query->where('namaBanSistem', 'like', '%' . $search . '%');
            });
        }
    
        $fisik = $query->paginate(5);
        
        return view('pages.fisik', compact('fisik'));
    }    

    public function create() {
        $ban = Masterban::all();
        return view('pages.form', compact('ban'));
    }
    public function search(Request $request) {
        
        return view('pages.fisik', [
            $fisik = Masterfisik::where('timeStock', 'LIKE', '%'.$request->search.'%')->paginate(3),
        ], compact('fisik'));
    }

    public function store(Request $request){
        
        $fisik = new Masterfisik;

        $fisik->jumlahBan = $request->jumlahBan;
        $fisik->idBan = $request->idBan;

        $fisik->save();

        return redirect('/stockfisik');
    }

    public function destroy($id) {
        $fisik = Masterfisik::where('idStokFisik', $id)->first();

        if (!$fisik) {
            return redirect('/stockfisik')->with('error', 'Record not found');
        }

        Log::info('Fisik found with idFisik: ' . $fisik);
    
        DB::table('stokfisikban')->where('idStokFisik', $fisik->idStokFisik)->delete();
    
        return redirect('/stockfisik')->with('success', 'Record deleted successfully');
    }
}
