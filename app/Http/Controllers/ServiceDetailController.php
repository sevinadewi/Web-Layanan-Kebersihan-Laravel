<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    // public function serviceDetail($id)
    // {
    //     $service = Services::findOrFail($id);
    //     return view('serviceDetail', ['service' => $service]);
    // }

    public function serviceByName($name)
    {
        $name = str_replace('-', ' ', $name); //menghilangi - dari url
        $name = ucwords($name); //mengubah huruf pertama masing2 kata menjadi Kapital

        $service = Services::where('name', $name)->firstOrFail();
        return view('service-detail', ['service' => $service]);
    }
}

// 'service' (kiri) = Nama variabel di view
// $service (kanan) = Data yang diambil dari database