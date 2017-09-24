<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    protected $table='staffs';
    public $timestamps = false;

    public static function getAllTherapist(){

        $therapist= DB::table('staffs')
            ->where('staffs.type','=',2)
            ->join('shops','shops.id','=','staffs.shop_id')
            ->select('staffs.*','shops.business_name as shopName')
            ->get();
        return $therapist;
    }

    public static function getAllSaler(){
        $salers = DB::table('staffs')->select('id','NICK')->where('type','=',6)->get();
        return $salers;
    }
}
