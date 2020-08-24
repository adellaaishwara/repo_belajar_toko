<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customersController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
                [
                    'nama_cust' => 'required'
                ]
            
            );

            if($validator->fails()){
                return Response()->json($validator->errors());
            }
            $simpan = customers::create([
                'nama_cust' => $request->nama_cust
            ]);

            if ($simpan) {
                return Response()->json(['status' => 1]);
            }
            else {
                return Response()->json(['status' => 0]);
        }
    }
}
