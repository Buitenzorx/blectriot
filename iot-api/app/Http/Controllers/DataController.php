<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
    return Data::all();
    }
    public function store(Request $request)
    {
        $data = new Data;
        $data->nama_device = $request->nama_device;
        $data->nilai = $request->nilai;
        $data->save();
        
        return response()->json([
        "message" => "Device telah ditambahkan."
        ], 201);
    }
    public function show(string $id)
    {
    return Data::find($id);
}

public function getDeviceId($id)
{
    $devices = Data::find($id); // Mengambil data perangkat berdasarkan ID
    $nilai = Data::pluck('nilai');
    return view('devices', [
        "title" => "Devices",
        "devices" => [$devices], 
        "nilai" => [$nilai]
    ]);
}
}
