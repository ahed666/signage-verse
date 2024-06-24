<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCode extends Model
{
    use HasFactory;
    protected $table="devices_codes";

    protected $fillable = ['code', 'pin'];



    public static function checkPinAvailable($pin){
        
       return self::wherepin($pin)->first();

    }


}
