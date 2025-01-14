<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'region' => 'required|string',
            'handphone' => 'required|string',
            'duration' => 'required|integer',
            'date' => 'required|date',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();
        Order::create($validated);
        return redirect('/general');
    }
}
