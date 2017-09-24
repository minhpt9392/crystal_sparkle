<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopOpeningHour extends Model
{
    protected $table='shop_opening_hours';
    public $timestamps = false;

    public static function getCurrentSetting($shopId){
        $curSet = ShopOpeningHour::where('shop_id',$shopId)->first();
        return $curSet;
    }

    public static function setOperationTime($shopId, $dayFrom, $dayTo, $nightFrom, $nightTo)
    {
        $curSet = ShopOpeningHour::where('shop_id',$shopId)->first();
        $curSet->day_from   = $dayFrom;
        $curSet->day_to     = $dayTo;
        $curSet->night_from = $nightFrom;
        $curSet->night_to   = $nightTo;
        $curSet->save();
        return 1;
    }

    public static function getListOperation()
    {
        $list = self::join('shops','shops.id','=','shop_opening_hours.shop_id')
            ->select('shop_opening_hours.*','shops.business_name as shopName')
            ->get();
        return $list;
    }

    public static function deleteOperation($id)
    {
        $list = ShopOpeningHour::find($id);
        $list->delete();
        return 1;
    }
}
