<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MassageServiceItem extends Model
{
    protected $table='massage_service_items';
    public $timestamps = false;

    public static function getAllMassageItem(){
        $massages=DB::table('massage_service_items')->select('id','name_eng')->get();
        return $massages;
    }
}
