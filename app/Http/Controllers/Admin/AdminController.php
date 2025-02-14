<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $number_of_services = Services::get()->count();
        return view('admin.dashboard', ['jumlah_layanan' => $number_of_services]);
    }

    public function services()
    {
        $service = Services::get();
        return view('admin.services', ['data' => $service]);
    }

    public function deleteServices($id_service)
    {
        $service = Services::where('id', $id_service)->delete();
        return redirect('/admin-services');
    }

    public function createServices(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'description_text'=> 'required|string',
            'description_poin' => 'required|array',
            'price' => 'required|integer',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('alert','Data yang anda masukkan salah');
        }
        $check = Services::where('name',$request->name)->first();
        if ($check) {
            return Services::back()->with('alert','Layanan sudah terdata');
        }
        $file = $request->file('picture');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('pictures'), $fileName); // Save the file to the "uploads" directory
        $path = '/pictures/' . $fileName;
        $data = [
            'name' => $request->name,
            'description_text' => $request->description_text,
            'description_poin' => $request->description_poin,
            'price' => $request->price,
            'picture' => $path
        ];
        Services::create($data);
        return redirect('/admin-services');
    }

    public function editServices(Request $request, $id_service)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'description_text'=> 'required|string',
            'description_poin' => 'required|array',
            'price' => 'required|integer',
        ]);
        if ($validator->fails()) {
            dd('test');
            return Redirect::back()->with('alert', 'data yang anda masukkan salah');
        }
        $check = Services::where('name',$request->name)->where('id','!=',$id_service)->first();
        if ($check) {
            return Redirect::back()->with('alert','Layanan sudah digunakan');
        }
        $data = [
            'name' => $request->name,
            'description_text' => $request->description_text,
            'description_poin' => $request->description_poin,
            'price' => $request->price,
        ];
        Services::where('id', $id_service)->update($data);
        return redirect('admin-services');
    }
}
