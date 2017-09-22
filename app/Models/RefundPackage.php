<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RefundPackage extends Model
{
    protected $table='refundpackage';
    public $timestamps = false;

    public static function addNewRefundPackage($packageTypeID, $puchaseDate, $puchasePrice,
                                               $section, $sectionUsed, $refundAmount, $reason, $method)
    {
        $new = new RefundPackage();
        $new->package_id      = $packageTypeID;
        $new->purchase_date   = $puchaseDate;
        $new->purchase_price  = $puchasePrice;
        $new->section         = $section;
        $new->section_used    = $sectionUsed;
        $new->refund_amount   = $refundAmount;
        $new->reason          = $reason;
        $new->method          = $method;
        $new->save();
    }

    public static function listPackageRefund()
    {
        $list = DB::table('refundpackage')
            ->leftjoin('packagetype','packagetype.id','=','refundpackage.package_id')
            ->select('refundpackage.*', 'packagetype.name as packageName')
            ->get();
        return($list);
    }

    public static function getRefundPackageById($id)
    {
        $list = DB::table('refundpackage')
            ->join('packagetype','packagetype.id','=','refundpackage.package_id')
            ->where('refundpackage.id',$id)
            ->select('refundpackage.*', 'packagetype.name as packageName')
            ->first();
        return($list);
    }

    public static function updateRefundPackage($id, $packageTypeID, $purchaseDate, $purchasePrice,
                                               $section, $sectionUsed, $refundAmount, $reason, $method)
    {
        $package = RefundPackage::find($id);
        $package->package_id     = $packageTypeID;
        $package->purchase_date  = $purchaseDate;
        $package->purchase_price = $purchasePrice;
        $package->section        = $section;
        $package->section_used   = $sectionUsed;
        $package->refund_amount  = $refundAmount;
        $package->reason         = $reason;
        $package->method         = $method;
        $package->save();
    }

    public static function deleteRefundPackage($id)
    {
        $p = RefundPackage::find($id);
        $p->delete();
        return 1;
    }
}
