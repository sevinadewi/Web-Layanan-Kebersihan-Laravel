<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function serviceDetail($id)
    {
        $service = Services::findOrFail($id);
        return view('serviceDetail', ['service' => $service]);
    }
}

// 'service' (kiri) = Nama variabel di view
// $service (kanan) = Data yang diambil dari database