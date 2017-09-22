<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PackageType extends Model
{
    protected $table='package_types';
    public $timestamps = false;

    public static function getAllPackageType()
    {
        $package = DB::table('package_types')->select('id','name')->get();
        return $package;
    }

    public static function getPackageInfoById($id)
    {

        $package = DB::table('package_types')->where('id', $id)->first();
        return $package;
    }

    public static function getPeriodTimeOfPackage($id)
    {
        $package = DB::table('package_types')->where('id', $id)->select('time_period')->get();
        return $package;
    }

    public static function addPackage($name, $type, $price, $bonus, $period, $commission, $range)
    {
        $package = new PackageType();
        $package->name          = $name;
        $package->type          = $type;
        $package->price         = $price;
        $package->bonus_value   = $bonus;
        $package->time_period   = $period;
        $package->commission    = $commission;
        $package->package_range = $range;
        $package->save();
    }

    public static function editPackageType($id, $name, $type, $price, $bonus, $period, $commission, $range)
    {
        $package = PackageType::find($id);
        $package->name          = $name;
        $package->type          = $type;
        $package->price         = $price;
        $package->bonus_value   = $bonus;
        $package->time_period   = $period;
        $package->commission    = $commission;
        $package->package_range = $range;
        $package->save();
    }

    public static function listPackageType()
    {
        $packages = DB::table('package_types')->get();
        return $packages;
    }

    public static function deletePackageType($id)
    {
        $package = PackageType::find($id);
        $package->delete();
        return 1;
    }

}
