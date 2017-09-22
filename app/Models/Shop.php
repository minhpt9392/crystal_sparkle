<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    protected $table='shops';
    public $timestamps = false;

    public static function getListShopName(){
        $shops = DB::table('shops')->select('id','business_name')->get();
        return $shops;
    }

    public static function addNewRoom($id, $name){

    }
}
