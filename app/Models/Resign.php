<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resign extends Model
{
//    protected $table='resign';
   public $timestamps = false;

    public static function addResign($staffId, $type, $actionDate, $permitCancelDate, $reason){
        //$resign = new Resign;
        DB::table('resigns')->insert([
            'STAFF_AccID' => $staffId,
            'type' => $type,
            'action_date' => $actionDate,
            'permit_cancel_date' => $permitCancelDate,
            'reason' => $reason,
        ]);
    }

    public static function getListResign()
    {
        $listResign = DB::table('resigns')->get();
        return $listResign;
    }
}
