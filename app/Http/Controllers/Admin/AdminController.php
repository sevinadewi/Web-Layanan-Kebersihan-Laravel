<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $number_of_services = Services::get()->count();
        return view('admin.dashboard', ['jumlah_layanan' => $number_of_services]);
    }

    public function services()
    {
        $service = Services::get()->toArray();
        return view('admin.services', ['data' => $service]);
    }

    public function deleteServices($id_service)
    {
        $service = Services::where('id', '$id_services')->delete();
        return redirect('/admin-services');
    }
}
