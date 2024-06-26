<?php
namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;
class DeviceController extends Controller
{
    public function index()
    {
    return Device::all();
    }
    public function store(Request $request)
    {
        $device = new Device;
        $device->nama_device = $request->nama_device;
        $device->nilai = $request->nilai;
        $device->save();
        
        return response()->json([
        "message" => "Device telah ditambahkan."
        ], 201);
    }
    public function show(string $id)
    {
    return Device::find($id);
    }
    public function update(Request $request, string $id)
        {
        if (Device::where('id', $id)->exists()) {
            $device = Device::find($id);
            $device->nama_device = is_null($request ->nama_device) ? $device->nama_device : $request->nama_device;
            $device->nilai = is_null($request->nilai) ? $device->nilai : $request->nilai;
            $device->save();
            

            return response()->json([
            "message" => "Device telah diupdate."
            ], 201);
        } else {
            return response()->json([
            "message" => "Device tidak ditemukan."
            ], 404);
        }
        }
    public function destroy(string $id)
    {
        if (Device::where('id', $id)->exists()) {
            $device = Device::find($id);
            $device->delete();
            return response()->json([
            "message" => "Device telah dihapus."
            ], 201);
        } else {
            return response()->json([
            "message" => "Device tidak ditemukan."
            ], 404);
        }
    }

    public function showDevices()
    {
        $devices = Device::all(); // Mengambil semua data perangkat dari database
        $nilai = Device::pluck('nilai');
        return view('devices', [
            "title" => "Devices",
            "devices" => $devices,
            "nilai" => $nilai
        ]);
    }

    // Method untuk mendapatkan ID dari database
    public function getDeviceId($id)
{
    $device = Device::find($id); // Mengambil data perangkat berdasarkan ID
    $nilai = Device::pluck('nilai');
    if (!$device) {
        return "Perangkat dengan ID $id tidak ditemukan.";
    }
    return view('devices', [
        "title" => "Devices",
        "devices" => [$device], 
        "nilai" => [$nilai]
    ]);
}   

}