<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Configuration extends Model
{
    protected $table='configurations';
    public $timestamps = false;

    public static function setConfig($status)
    {
        $survey = self::where('key','like','%surveyConfig%')
            ->update([
                'value' => $status
            ]);
        return 1;
    }

    public static function getCurrentStatus()
    {
        $status = self::where('key','like','%surveyConfig%')->select('value')->first();
        return $status;
    }

}