<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mastermarketplace;

class Markerplacecontroller extends Controller
{
    public function index(){
        $mp = Mastermarketplace::paginate(2);
        // dd('berhasil icibos');
        
        return response()->view('pages.coba', compact('mp'));
    }
}
