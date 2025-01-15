<?php

namespace App\Http\Controllers;

use App\Models\Masterban;
use App\Models\Mastermotor;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    public function index()
    {
        $motors = Mastermotor::all();
        $bans = Masterban::all();

        return view('pages.mapping.index', compact('motors', 'bans'));
    }
}
