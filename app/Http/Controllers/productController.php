<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;



class productController extends Controller
{
    public function show()
    {
        return product::all();
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
                [
                    'nama_product' => 'required',
                    'id_prod' => 'required',
                    'id_cust' => 'required'
            
                ]
            );
            
            if($validator->fails()){

                return Response()->json($validator->errors());
            }
            $simpan = product::create([
                'nama_product' => $request->nama_product,
                'id_prod' => $request->id_prod,
                'id_cust' => $request->id_cust
            ]);

            if($simpan) {
                return Response()->json(['status' => 1]);
            }
            else {
                return Response()->json(['status' => 0]);
            }
        }
    }
