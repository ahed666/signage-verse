<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeviceCode;
use App\Models\Pictures;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\StandbykiosksMedia;
use Illuminate\Support\Facades\Auth;
class Device extends Model
{
    use HasFactory;
    protected $table="devices";

    protected $fillable = ['code', 'pin','account_id','name','site','longitude','latitude'];


    public static function getAllDeviceBerAccount(){
      return self::where('devices.account_id',Auth::user()->current_account_id)->get();
    }




}
