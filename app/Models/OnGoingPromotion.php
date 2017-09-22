<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OnGoingPromotion extends Model
{
    protected $table='ongoingpromotion';
    public $timestamps = false;

    public static function createPromotion($noExpenditure, $timePeriod, $freeService, $discounted, $packages, $startDate, $endDate)
    {
        $p = new OnGoingPromotion();
        $p->number_expenditure = $noExpenditure;
        $p->time_period        = $timePeriod;
        $p->free_service       = $freeService;
        $p->discounted         = $discounted;
        $p->packages           = $packages;
        $p->start_date         = $startDate;
        $p->end_date           = $endDate;
        $p->save();
    }

    public static function listOnGoingPromotion()
    {
        $list = self::get();
        return $list;
    }

    public static function getOnGoingPromotionById($id)
    {
        $promotion = self::find($id);
        return $promotion;
    }

    public static function editPromotion($id, $noExpenditure, $timePeriod, $freeService, $discounted, $packages, $startDate, $endDate)
    {
        $p = OnGoingPromotion::find($id);
        $p->number_expenditure = $noExpenditure;
        $p->time_period        = $timePeriod;
        $p->free_service       = $freeService;
        $p->discounted         = $discounted;
        $p->packages           = $packages;
        $p->start_date         = $startDate;
        $p->end_date           = $endDate;
        $p->save();
    }

    public static function deleteOnGoingPromotion($id)
    {
        $promotion = OnGoingPromotion::find($id);
        $promotion->delete();
        return 1;
    }

}
