<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Promotion extends Model
{
    protected $table='promotions';
    public $timestamps = false;
    const APPROVED = 1;
    const REJECTED = 2;

    public static function getAllPromotions() {
        $promotions = DB::table('promotions')
            ->leftjoin('shops','shops.id','=','promotions.shop_id')
            ->select('promotions.*','shops.business_name')
            ->get();
        return $promotions;
    }

    public static function getPromotionByID($id)
    {
        $promotion = DB::table('promotions')->where('id','=',$id)->first();
        return $promotion;
    }

    public static function addNewPromotion($code, $shopId, $start, $end, $massageId, $discountType, $rate, $flatRate){
        $newPro                  = new Promotion;
        $newPro->code            = $code;
        $newPro->shop_id         = $shopId;
        $newPro->start_date      = $start;
        $newPro->end_date        = $end;
        $newPro->item_type       = $massageId;
        $newPro->rate            = $rate;
        if($rate==null)
        {
            $newPro->rate        = $flatRate;
        }
        $newPro->discount_type   = $discountType;
        $newPro->save();
    }

    public static function updatePromotion($id, $code, $shopId, $start, $end, $itemType,$discountType, $rate)
    {
        $a = DB::table('promotions')->where('id',$id)->first();
        $promotion = DB::table('promotions')->where('id',$id)
            ->update([
                'code'           => $code,
                'shop_id'        => $shopId,
                'start_date'     => $start,
                'end_date'       => $end,
                'item_type'      => $itemType,
                'discount_type'  => $discountType,
                'rate'           => $rate,
            ]);
        DB::commit();
        return 1;
    }

    public static function deletePromotion($id)
    {
        $promotion = DB::table('promotions')->where('id',$id)->first();
        if($promotion !=null)
        {
            DB::table('promotions')->where('id','=',$id)->delete();
            return true;
        }
        return false;
    }
}
