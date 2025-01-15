<?php

namespace App\Http\Controllers;

use App\Models\Masterfisik;
use App\Models\Mastermarketplace;
use Illuminate\Http\Request;
use App\Models\Mastervirtual;
use Illuminate\Support\Facades\Log;

class Mastervirtualcontroller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil parameter pencarian dari request
        $query = Mastervirtual::with('marketplace', 'stokBan'); // Perbaiki tanda kutip dan tambahkan koma

        if (!empty($search)) {
            $query->whereHas('stokBan.masterBan', function ($q) use ($search) {
                $q->where('namaBanSistem', 'like', '%' . $search . '%');
            })->orWhereHas('marketplace', function ($q) use ($search) {
                $q->where('namaMarketplace', 'like', '%' . $search . '%');
            });
        }

        $virtual = $query->paginate(5); // Batasi hasil menjadi 5 item per halaman

        return response()->view('pages.virtual.index', compact('virtual'));
    }




    public function create()
    {
        // Get all Masterfisik and Mastermarketplace data
        $stokFisik = Masterfisik::all();
        $marketplace = Mastermarketplace::all();

        return view('pages.virtual.create', compact('stokFisik', 'marketplace'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idStokFisik' => 'required',
            'idMarketplace' => 'required',
            'timeStok' => 'required|date',
            'jumlahBan' => 'required|integer',
        ]);

        Mastervirtual::create([
            'idStokFisik' => $validatedData['idStokFisik'],
            'idMarketplace' => $validatedData['idMarketplace'],
            'timeStok' => $validatedData['timeStok'],
            'jumlahBan' => $validatedData['jumlahBan'],
        ]);

        return redirect('/stockvirtual')->with('success', 'Mastervirtual record created successfully');
    }

    public function destroy($id)
    {
        $virtual = Mastervirtual::find($id);

        if (!$virtual) {
            Log::error('Mastervirtual record not found with id: ' . $id);
            return redirect('/mastervirtual')->with('error', 'Record not found');
        }

        // Delete the record
        $virtual->delete();

        // Redirect back to the index page with a success message
        return redirect('/mastervirtual')->with('success', 'Mastervirtual record deleted successfully');
    }
}
