<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class ordersController extends Controller
{
    public function store(Request $request)
    {

    $validator=Validator::make($request->all(),
        [
            'tgl_orders' => 'required',
            'id' => 'required',
            'id_cust' => 'required'
        ]
    
    );

    if($validator->fails()){
        return Response()->json($validator->errors());
    }
    $simpan = orders::create([
        'tgl_orders' => $request->tgl_orders,
        'id' => $request->id,
        'id_cust' => $request->id_cust

    ]);

    if($simpan) {
        return Response()->json(['status' => 1]);
    }
    else {
        return Response()->json(['status' => 0]);
        }
    }

        public function show()
        {
        $data_orders = orders::join('customers', 'customers.id_cust', 'orders.id_cust')->get();
            return Response()->json($data_orders);
        }
        public function detail($id)
        {
            if (orders::where('id', $id)->exist()) {
                $data_orders = orders::join('customers', 'customers.id_cust', 'orders.id_cust')
                                            ->where('orders.id', '=', $id)
                                            ->get();

                    return Response()->json($data_orders);
            }
            else{
                return Response()->json(['message' => 'Tidak ditemukan']);
        }
}
}
    
    

    

