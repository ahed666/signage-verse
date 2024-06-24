<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\DeviceCode;
use App\Jobs\RefreshKiosks;
use Illuminate\Support\Facades\Auth;
use App\Events\PlaylistUpdated;
class DeviceController extends Controller
{


      public function index(){
        $devices = DeviceCode::all();
        return view('devices', ['devices' => $devices]);

      }

            public function refreshDevice($deviceCode)
        {
            event(new PlaylistUpdated($deviceCode));

            // Logic to refresh the device data
            // You can use the device code to identify the device and perform the necessary actions
            return response()->json(['message' => 'Device refreshed successfully']);
        }

    public function generateDeviceCodeWithPin(){

        do {
            $pin = $this->generateRandomPIN();
        } while (DeviceCode::where('pin', $pin)->exists());

        do {
            $code = $this->generateRandomCode();
        } while (Device::where('code', $code)->exists() || DeviceCode::where('code', $code)->exists());


        DeviceCode::create(['code' => $code,'pin'=>$pin]);
        return response()->json(['pin' => $pin, 'code' => $code]);

    }
    private function generateRandomPIN()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    private function generateRandomCode()
    {
        return str_pad(mt_rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);
    }
}
