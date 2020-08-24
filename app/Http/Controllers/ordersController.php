<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function store(Request $request)
    {

    $validator=Validator::make($request->all(),
        [
            'tgl_orders' => 'required'
        ]
    
    );

    if($validator->fails()){
        return Response()->json($validator->errors());
    }
    $simpan = orders::create([
        'tgl_orders' => $request-> tgl_orders
    ]);

    if($simpan) {
        return Response()->json(['status' => 1]);
    }
    else {
        return Response()->json(['status' => 0]);
        }
    }
}
