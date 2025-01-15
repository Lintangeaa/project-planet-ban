<?php

namespace App\Http\Controllers;
use App\Models\Coba;


use Illuminate\Http\Request;

class Cobacontroller extends Controller
{
    public function index(){
        $motor = Coba::all();
        
        return response()->view('pages.coba', compact('motor'));
    }

    public function findMotorName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Coba::select('listMotor','id')->where('list_Motor',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}


	public function findNama(Request $request){
	
		//it will get price if its id match with product id
		$p=Coba::select('namaMotor')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}

}
