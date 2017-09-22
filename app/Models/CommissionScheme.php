<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommissionScheme extends Model
{
    protected $table='commission_scheme';
    public $timestamps = false;

    public static function getListCustomer(){
        $listCustomer = DB::table('customers')->select('id','name')->get();
        return $listCustomer;
    }

    public static function getCommissionInfo($type, $role)
    {
        $info = DB::table('commission_scheme')
            ->where('base_model', $type)
            ->where('role', $role)
            ->get();
        return $info;
    }

    public static function setCommissionInfo($type, $role, $component, $massage, $package, $product)
    {
        $com = CommissionScheme::where('base_model', $type)
            ->where('role', $role)
            ->first();
        $com->fixed_component = $component;
        $com->massage         = $massage;
        $com->package         = $package;
        $com->product         = $product;
        $com->save();

        return 1;

    }
}
