<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PackageSale extends Model
{
    protected $table='packagesale';
    public $timestamps = false;

    public static function addNewPackageSale($customerId, $packageType, $startDate, $endDate, $saler, $therapist, $cash,
             $nets, $creditCard, $startPrepaid, $bonusValue, $balanceBonusValue)
    {
        $packageSale = new PackageSale();
        $packageSale->customer_id = $customerId;
        $packageSale->package_type_id = $packageType;
        $packageSale->start_date = $startDate;
        $packageSale->end_date = $endDate;
        $packageSale->sale_attributed = $saler;
        $packageSale->sale_entered = $therapist;
        $packageSale->cash = $cash;
        $packageSale->nets = $nets;
        $packageSale->credit_card = $creditCard;
        $packageSale->save();
    }

    public static function listPackageSold()
    {
        $listPackage = DB::table('package_sales')
            ->join('customers','customers.id','=','package_sales.customer_id')
            ->join('package_types','package_types.id','=','package_sales.package_type_id')
            ->leftJoin('staffs as a','package_sales.sale_attributed','=','a.id')
            ->leftJoin('staffs as b','package_sales.sale_entered','=','b.id')
            ->select('package_sales.*','package_types.name as packageName','customers.name as customerName','a.NICK as saler','b.NICK as therapist')
            ->get();
        return $listPackage;
    }

}
