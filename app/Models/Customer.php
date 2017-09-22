<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table='customers';
    public $timestamps = false;

    public static function getListCustomer(){
        $listCustomer = DB::table('customers')->select('id','name')->get();
        return $listCustomer;
    }
}
