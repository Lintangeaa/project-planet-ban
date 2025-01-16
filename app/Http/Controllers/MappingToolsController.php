<?php

namespace App\Http\Controllers;

use App\Models\Masterban;
use App\Models\Mastermotor;
use Illuminate\Http\Request;

class MappingToolsController extends Controller
{ 
  public function index(Request $request)
  {
      $searchBan = $request->input('searchBan');
      $searchMotor = $request->input('searchMotor');

      $bans = Masterban::join('mappingban as mg', 'masterban.idBan', '=', 'mg.idBan')
          ->join('mastermotor as m', 'mg.idMotor', '=', 'm.idMotor')
          ->when($searchBan, function ($query, $searchBan) {
              $query->where('m.namaMotor', 'like', '%' . $searchBan . '%')
                    ->orWhere('m.ringMotorStd', 'like', '%' . $searchBan . '%');
          })
          ->select('masterban.*')
          ->paginate(10)
          ->appends(['searchBan' => $searchBan]);

      $motors = Mastermotor::join('mappingban as mg', 'mastermotor.idMotor', '=', 'mg.idMotor')
          ->join('masterban as b', 'mg.idBan', '=', 'b.idBan')
          ->when($searchMotor, function ($query, $searchMotor) {
              $query->where('b.namaBanSistem', 'like', '%' . $searchMotor . '%')
                    ->orWhere('b.namaBanUmum', 'like', '%' . $searchMotor . '%');
          })
          ->select('mastermotor.*')
          ->paginate(10)
          ->appends(['searchMotor' => $searchMotor]);

      return view('pages.tools', compact('bans', 'motors'));
  }
}
